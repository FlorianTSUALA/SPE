<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nTransactionController extends Controller
{
    public function callback_sucess(Request $request, String $status)
    {
        // $transaction = new Transaction;
        // $transaction->status = $status;
        // $transaction->statut = $request->statut;
        // $result = $transaction->save();
        // if($result):
        //     return [ "statut" => "Transaction result saved successfully"];
        // else:
        //     return [ "statut" => "Transaction result saved failled"];
        // endif;
    }
}
