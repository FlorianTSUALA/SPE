<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function telephone_info($token, $type='mobile_money', $telephone)
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
        curl_close($curl);
        $message = $response["message"]; // "Network Found",
        $network = $response["network"]; // "Airtel Gabon",
        $mobile_money_logo = $response["mobile_money_logo"]; // "",
        $mobile_money_code = $response["mobile_money_code"]; // "AM",
        $country = $response["country"]; // "GA",
        $mobile_money_svce = $response["mobile_money_svce"]; // "Airtel Money",
        $statusRequest = $response["statusRequest"]; // 200
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
        $url_callback_success = route('', [ 'service' => $this->service, 'type' => 'success']);
        $url_callback_fail = route('', [ 'service' => $this->service, 'type' => 'fail']);
        $url_callback = route('', [ 'service' => $this->service, ]);
        $url = 'https://api.mypayga.com/v1/payment';

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>" {
            'urls': {
                'success_url': '$url_callback_success',
                'fail_url': '$url_callback_fail',
                'callback_url': '$url_callback',
                },
            'apikey': '$token',
            'client_phone': '$telephone',
            'amount': '$montant',
            'country': 'GA',
            'network': 'AM',
            'type':'mobile_money',
            'unique_id':'$unique_id',
            'firstname':'$firstname',
            'lastname':'$lastname',
            'email':'$email'
        }",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function upload_file($uploadedFile){
        try{
            $filename = time().$uploadedFile->getClientOriginalName();
            /** @var Illuminate\Filesystem\FilesystemAdapter */
            $filesystem = Storage::disk('local');
            $filesystem->putFileAs( 'piece_jointe/'.$filename, $uploadedFile, $filename);
            return $filename;
        }catch(Exception $ex){
            return '';
        }
    }

    public function save_transation($response, $service){
        $transaction = new Transaction;
        $transaction->payment_method = 'Mobile';
        $transaction->type_service = $service;
        $transaction->message = $response['message'];
        $transaction->payment_token = $response['payment_token'];
        $transaction->description = $response['description'];
        $transaction->status_request = $response['statusRequest'];
        $transaction->request_status = $response['request_status'];
        $transaction->transaction_amount = $response['transaction']['amount'];
        $transaction->transaction_country = $response['transaction']['country'];
        $transaction->transaction_currency = $response['transaction']['currency'];
        $transaction->transaction_service_id = $response['transaction']['id'];
        $result = $transaction->save();
        if($transaction->request_status == '200'):
            return [ "done" => true, "title" => "Bingo ...", "message"=> "votre transaction a été realisée avec success"];
        else:
            return ["done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer"];
        endif;
    }


}
