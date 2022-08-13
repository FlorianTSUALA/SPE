<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function telephone_info($token, $telephone, $type='mobile_money')
    {
        $curl = curl_init();
        $url = "https://api.mypayga.com/network?apikey=$token&tel_number=$telephone&country=GA&type=$type";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        if($response['statusRequest'] == 200){
            $message = $response["message"]; // "Network Found",
            $network = $response["network"]; // "Airtel Gabon",
            $mobile_money_logo = $response["mobile_money_logo"]; // "",
            $mobile_money_code = $response["mobile_money_code"]; // "AM",
            $country = $response["country"]; // "GA",
            $mobile_money_svce = $response["mobile_money_svce"]; // "Airtel Money",
            $statusRequest = $response["statusRequest"]; // 200
        }
        return $response;
    }

    function gen_unique_code($id, $service){
        mt_srand((double)microtime()*10000);
        $charid = md5(uniqid(rand(), true));
        $c = unpack("C*",$charid);
        $c = implode("",$c);
        return $id.'_'.$service.'_'.substr($c,0,20);
    }

    public function perform_api_transaction($token, $telephone, $email, $montant, $firstname, $lastname, $unique_id){
        $url_callback_success = route('callback_transaction_status', ['status' => 'success']);
        $url_callback_fail = route('callback_transaction_status', ['status' => 'error']);
        $url_callback = route('callback_transaction');
        $url = 'https://api.mypayga.com/v1/payment';

        $post_field = <<<EOD
            {
                "urls": {
                    "success_url": "$url_callback_success",
                    "callback_url": "$url_callback",
                    "fail_url": "$url_callback_fail"
                    },
                "apikey": "$token",
                "client_phone": "$telephone",
                "amount": "$montant",
                "country": "GA",
                "network": "AM",
                "type": "mobile_money",
                "unique_id": "$unique_id",
                "firstname": "$firstname",
                "lastname": "$lastname",
                "email": "$email"
            }
        EOD;

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL =>  $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $post_field,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        return $response;
    }

    public function upload_file(Request $request, $tag, $folder="piece_jointe"){
        try{
            if($request->hasFile($tag)){
                $fileName = time().$request->file($tag)->getClientOriginalName();
                $path = $request->file($tag)->storeAs("public/$folder", $fileName);
                return '/storage/'.$path;
            }else{
                return '';
            }
        }catch(Exception $ex){
            $this->log("error", "upload_file", $ex);
            return 'non défini';
        }
    }

    public function save_transation($response, $service){
        $error = "";
        $transaction = new Transaction;
        try{
            $transaction->payment_method = 'Mobile';
            $transaction->type_service = $service;
            $transaction->message = $response['message']??"";
            $transaction->payment_token = $response['payment_token']??"";
            $transaction->description = $response['description']??"";
            $tmp = $response['transaction']??[];
            $transaction->transaction_amount = $tmp['amount']??"";
            $transaction->transaction_country = $tmp['country']??"";
            $transaction->transaction_currency = $tmp['currency']??"";
            $transaction->transaction_service_id = $tmp['id']??"";
        }catch(Exception $ex){
            $error = $ex;
        }
        $result = $transaction->save();
        if($response['request_status'] == '200'):
            $message = <<<EOD
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">Veuillez confirmer la transaction sur votre mobile!</p>
                            <p class="mb-0">En attente de la confirmation du statut de la transaction...</p>
                            <footer class="blockquote-footer"> <b></b> <cite title="temps approximatif restant">s.</cite></footer>
                        </blockquote>
            EOD;
            return ["icon" => "success", "done" => true, "title" => "Bingo.... Message Push envoyé!", "message"=> $message, 'reference'=> $response['payment_token'], "error"=> $error];
        else:
            return ["icon" => "error", "done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer", "error"=> $error];
        endif;
    }


    public function callback(Request $request)
    {
        $this->log("info", "callback", $request->all());
        return $this->callback_status($request, ($request->status_request == 200)? 'success':'error');
    }

    public function callback_status(Request $request, String $status)
    {
        // return;
        try{
            if(/*!in_array($service, ['samed', 'kredigo']) or*/ !in_array($status, ['error', 'success'])){
                return response()->json([
                    'code' => '500',
                    'status' => 'Not authorized',
                    'message' => 'Les paramatres de  la transaction est invalide',
                ]);
            }
            $transaction_service_id = $request->input('unique_id', $request->input('order_ref', 'non_defini'));
            $statut = $request->input('order_status', $request->input('status_request', 'non_defini'));

            $transaction = Transaction::where('transaction_service_id', '=', $transaction_service_id)->first();
            if ($transaction == null)
            {
                $transaction = new Transaction;
                $transaction->payment_token = $request->input('payment_token', 'non_defini');
            }

            $transaction->message = $request->input('message', 'non_defini');
            $transaction->payment_method = $request->input('payment_method', 'non_defini');
            $transaction->transaction_amount = $request->input('montant', $request->input('amount', 'non_defini'));
            // $transaction->transaction_currency = $request->input('currency', 'non_defini');
            // $transaction->transaction_country = $request->input('country', 'non_defini');
            $transaction->etat = ($statut == '200')? 'Sucess' : 'Echec';
            $transaction->transaction_service_id = $transaction_service_id;
            $result = $transaction->save();

            if($request->input('order_status', 'non_defini') == '200'):
                if($statut == '200'):
                    return response()->json(["icon" => "success", "done" => true, "title" => "Bingo ...", "message"=> "Merci pour ce service de rappel du statut de notre transaction !!!", ]);
                else:
                    return response()->json(["icon" => "error", "done" => true, "title" => "Oupss ...", "message"=> "Echec de la transaction, veuillez verifier que vous avez bien valider la transaction sur votre mobile !!!", ]);
                endif;
            else:
                return response()->json(["icon" => "warning", "done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la transaction, veuillez réessayer"]);
            endif;
        }catch(Exception $ex){
            var_dump($ex->getMessage());
            die("ok");
            $this->log("error", "callback_status", $ex);
            return response()->json(["icon" => "warning", "done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la transaction, veuillez réessayer", "error"=>$ex]);
        }
    }

    public function status(Request $request){
        $token = $request->input('token', 'non_defini');
        $transaction = Transaction::where('payment_token', '=', $token)->first();
        if ($transaction):
            switch($transaction->etat){
                case 'Sucess':
                    return response()->json(["icon" => 'success', "done"=> true,  "title" => "Super !!!", "message"=> "Transaction realisé avec success"]);
                break;

                case 'Echec':
                    return response()->json(["icon" => 'warning', "done"=> true, "title" => "Super !!!", "message"=> "Transaction realisé avec success"]);
                break;

                default:
                    return response()->json(["icon" => 'info', "done"=> false, "title" => "Super !!!", "message"=> "Veuillez patienter la requete est en cours de traitement"]);
            }
        else:
            return response()->json(["icon" => 'warning', "done"=> false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la transaction : Transaction non existante..."]);
        endif;
    }

    public function log($type, $location, $data, $folder="log"){
        if(is_array($data)){
            if(count(array_filter(array_keys($data), 'is_string')) > 0){
                $data = json_encode($data);
            }else{
                $data = implode(", ", $data);
            }
        }
        $time = date("j.n.Y");
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        $log  = "Location: ".$location.' - '.PHP_EOL.
        $log  = "Data: ".PHP_EOL.
        "data ".PHP_EOL.
        ".  .   .   .   .   .   .   .   .   .   .   .   .   .  ".PHP_EOL.
        $data.PHP_EOL.
        ".  .   .   .   .   .   .   .   .   .   .   .   .   .  ".PHP_EOL.
        "-------------------------------------------------------".PHP_EOL;
        file_put_contents("$folder/$type/$time.log", $log, FILE_APPEND);
    }

    public function generate_qr($value, $tag="id"){ //tag = ["id", "payment_token", "transaction_service_id", ]

    }

    public function download_invoice($tag, $value){

    }
}
