<?php

namespace App\Http\Controllers;

use App\Models\TransactionKredigo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceKredigoController extends ServiceController
{
    public function __construct(){
        $this->service = 'kredigo';
        $this->token = 'pprod_b3b90ecb-c60d-49bb-bbee-a5982d229ec8';
        $this->sprod_token = 'sprod_b92d7042-58bf-436c-88a5-2fe88d36212e';
    }

    public function index()
    {
        return view('/services/kredigo/index', []);
    }

    public function transation($request){
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $transaction = new TransactionKredigo;

        $transaction->civilite = $request->civilite;
        $transaction->nom = $request->nom;
        $transaction->prenom = $request->prenom;
        $transaction->date_naissance = $request->date_naissance;
        $transaction->telephone = $request->telephone;
        $transaction->email = $request->email;
        $transaction->ville = $request->ville;
        $transaction->secteur_emploie = $request->secteur_emploie;
        $transaction->nom_employeur = $request->nom_employeur;
        $transaction->date_embauche = $request->date_embauche;
        $transaction->type_contrat = $request->type_contrat;
        $transaction->salaire_net = $request->salaire_net;
        $transaction->banque = $request->banque;

        $transaction->piece_jointe_recto = $this->upload_file($request->file('piece_jointe_recto'));
        $transaction->piece_jointe_verso = $this->upload_file($request->file('piece_jointe_verso'));
        $transaction->piece_jointe_type = $request->piece_jointe_type;
        
        $transaction->frais = $request->frais;
        $transaction->moyen_paiement = $request->moyen_paiement;
        $transaction->numero_paiement = $request->numero_paiement;

        $result = $transaction->save();
        $transaction->token = $this->gen_unique_code($transaction->id, $this->service);
        $result = $transaction->save();

        try{
            $response = $this->perform_api_transaction($this->token, $transaction->telephone, $transaction->email, $transaction->frais, $transaction->nom, $transaction->prenom, $transaction->token);
            $response = $this->save_transation($response, $this->service);
            return $response;
        }catch(Exception $ex){
            return ["done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer"];
        }
    }


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
        echo $response;
    }

    public function save_form_kredigo(Request $request)
    {
        $token = "pprod_b3b90ecb-c60d-49bb-bbee-a5982d229ec8";
        $token_sprod = "sprod_b92d7042-58bf-436c-88a5-2fe88d36212e";
        $transaction = new TransactionKredigo;
        $transaction->nom = $request->nom;
        $transaction->save();
        return view('/services/kredigo', []);
    }

}
