<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function kredigo()
    {
        return view('/services/kredigo', []);
    }

    public function samed()
    {
        return view('/services/samed', []);
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

    public function save_form_samed(Request $request)
    {
        $token = "pprod_Aup1ryHoPrkD1C8VJF27j5Jr57WAKYWjqVX7NDs3L0WQYoum75";
        $token_sprod = "sprod_Dqh6BwW7qazrGf1mWBUSlG0E7ywFP8aqkcg7GJFAl0myZgDsuc";
        $transaction = new TransactionSamed;
        $transaction->nom = $request->nom;
        $transaction->save();
        return view('/services/samed', []);
    }

    public function gen_unique_code(){

    }

    public function perform_api_transaction($token, $telephone, $email, $montant, $firstname, $lastname){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mypayga.com/v1/payment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>' {
            "urls": {
                "success_url": "http://bill-gabon.com/callback/transaction/success",
                "fail_url": "http://bill-gabon.com/callback/transaction/fail",
                "callback_url": "http://bill-gabon.com/callback/transaction",
                },
            "apikey": "$token",
            "client_phone": "$telephone",
            "amount": "$montant",
            "country": "GA",
            "network": "AM",
            "type":"mobile_money",
            "unique_id":"gen_unique_code()",
            "firstname":"$firstname",
            "lastname":"$lastname",
            "email":"$email"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function condition()
    {
        return view('/services/samed', []);
    }


}
