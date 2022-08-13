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

    public function transation(Request $request){
        // $request->validate([
        //     'file' => 'required|mimes:pdf,jpg,png|max:2048',
        // ]);

        $response = $this->telephone_info($this->token, $request->input('numero_paiement', ''));
        if($response['statusRequest'] != 200){
            return response()->json(["done" => false, "title" => "Oups ...", "message"=> "Numero de la transaction est invalide, veuillez verifier"]);
        }

        $transaction = new TransactionKredigo;

        $transaction->civilite = $request->input('civilite', '');
        $transaction->nom = $request->input('nom', '');
        $transaction->prenom = $request->input('prenom', '');
        $transaction->date_naissance = $request->input('date_naissance', '');
        $transaction->telephone = $request->input('telephone', '');
        $transaction->email = $request->input('email', '');
        $transaction->ville = $request->input('ville', '');
        $transaction->secteur_emploie = $request->input('secteur_emploie', '');
        $transaction->nom_employeur = $request->input('nom_employeur', '');
        $transaction->date_embauche = $request->input('date_embauche', '');
        $transaction->type_contrat = $request->input('type_contrat', '');
        $transaction->salaire_net = $request->input('salaire_net', '');
        $transaction->banque = $request->input('banque', '');

        $transaction->piece_jointe_recto = $this->upload_file($request, 'piece_jointe_recto', 'piece_jointe');
        $transaction->piece_jointe_verso = $this->upload_file($request, 'piece_jointe_verso', 'piece_jointe');
        $transaction->piece_jointe_type = $request->input('piece_jointe_type', '');

        $transaction->frais = $request->input('frais', '');
        $transaction->moyen_paiement = $request->input('moyen_paiement', '');
        $transaction->numero_paiement = $request->input('numero_paiement', '');
        $transaction->token = $this->gen_unique_code("prodigit", $this->service);
        $result = $transaction->save();
        $transaction->token = $this->gen_unique_code($transaction->id, $this->service);
        $result = $transaction->save();
        try{
            $response = $this->perform_api_transaction($this->token, $transaction->numero_paiement, $transaction->email, $transaction->frais, $transaction->nom, $transaction->prenom, $transaction->token);
            $response = $this->save_transation($response, $this->service);
            return $response;
        }catch(Exception $ex){
            return ["done" => false, "title" => "Oups ...", "message"=> "Une erreur est survenue durant la trasaction, veuillez réessayer"];
        }
    }


}
