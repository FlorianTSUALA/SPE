<?php

namespace App\Http\Controllers;

use App\Models\TransactionSamed;
use Exception;
use Illuminate\Http\Request;

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

    public function transation($request){
        $transaction = new TransactionSamed();

        $transaction->civilite = $request->civilite;
        $transaction->nom = $request->nom;
        $transaction->prenom = $request->prenom;
        $transaction->date_naissance = $request->date_naissance;
        $transaction->telephone = $request->telephone;
        $transaction->ville = $request->ville;
        $transaction->lieu_residence = $request->lieu_residence;
        $transaction->email = $request->email;
        $transaction->situation_socio_profressionnelle = $request->situation_socio_profressionnelle;
        $transaction->est_assure = $request->est_assure;
        $transaction->offre_samed = $request->offre_samed;
        $transaction->pack = $request->pack;
        $transaction->frais = $request->frais;
        $transaction->moyen_paiement = $request->moyen_paiement;
        $transaction->si_adhesion = $request->si_adhesion;
        $transaction->numero_paiement = $request->numero_paiement;
        
        $result = $transaction->save();
        $transaction->token = $this->gen_unique_code($transaction->id, $this->service);
        $result = $transaction->save();

        try{
            $response = $this->perform_api_transaction($this->token, $transaction->telephone, $transaction->email, $transaction->frais, $transaction->nom, $transaction->prenom, $transaction->token);
            $response = $this->save_transation($response, $this->service);
            return response()->json($response);
        }catch(Exception $ex){
            return response()->json(["done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer !!! ErrorCode : $ex"]);
        }
    }

    public function condition()
    {
        return view('/services/samed/condition', []);
    }


}
