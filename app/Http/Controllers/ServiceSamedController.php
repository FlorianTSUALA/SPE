<?php

namespace App\Http\Controllers;

use App\Models\TransactionSamed;
use Exception;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ServiceSamedController extends ServiceController
{

    public function __construct(){
        $this->service = 'samed';
        $this->token = 'pprod_Aup1ryHoPrkD1C8VJF27j5Jr57WAKYWjqVX7NDs3L0WQYoum75';
        $this->sprod_token = 'sprod_Dqh6BwW7qazrGf1mWBUSlG0E7ywFP8aqkcg7GJFAl0myZgDsuc';
    }

    public function index()
    {
        return view('/services/samed/index', []);
    }

    public function transation(Request $request){
        $response = $this->telephone_info($this->token, $request->input('numero_paiement', 0));
        $status = isset($response['statusRequest'])? $response['statusRequest'] : (isset($response['status_request'])? $response['status_request'] : (isset($response['status_request'])? $response['order_status'] : 0));
        if($status != 200){
            return response()->json(["done" => false, "title" => "Oups ...", "message"=> "Numero de la transaction est invalide, veuillez verifier"]);
        }

        $transaction = new TransactionSamed();

        $transaction->civilite = $request->input('civilite', 'Mr');
        $transaction->nom = $request->input('nom', '');
        $transaction->prenom = $request->input('prenom', '');
        $transaction->date_naissance = $request->input('date_naissance', '');
        $transaction->telephone = $request->input('telephone', '');
        $transaction->ville = $request->input('ville', '');
        $transaction->lieu_residence = $request->input('lieu_residence', '');
        $transaction->email = $request->input('email', '');
        $transaction->situation_socio_profressionnelle = $request->input('situation_socio_profressionnelle', '');
        $transaction->est_assure = $request->input('est_assure', '');
        $transaction->offre_samed = $request->input('offre_samed', '');
        $transaction->pack = $request->input('pack', '');
        $transaction->frais = $request->input('frais', 0);
        $transaction->moyen_paiement = $request->input('moyen_paiement', '');
        // $transaction->si_adhesion = $request->input('si_adhesion', '');
        $transaction->numero_paiement = $request->input('numero_paiement', 0);
        $transaction->token = $this->gen_unique_code("prodigit", $this->service);

        $result = $transaction->save();
        $transaction->token = $this->gen_unique_code($transaction->id, $this->service);
        $result = $transaction->save();

        try{
            $response = $this->perform_api_transaction($this->token, $transaction->numero_paiement, $transaction->email, $transaction->frais, $transaction->nom, $transaction->prenom, $transaction->token);
            $response = $this->save_transation($response, $this->service);
            return response()->json($response);
        }catch(Exception $ex){
            return response()->json(["done" => false, "title" => "Oups ++ ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer !!!", "error" => $ex]);
        }
    }

    public function condition()
    {
        return view('/services/samed/condition', []);
    }


}
