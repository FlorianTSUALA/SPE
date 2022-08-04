<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('callback/transaction/{status}', [TransactionController::class, 'callback_transaction'])->name("callback_transaction");
Route::post('callback_sucess', [TransactionController::class, 'callback_sucess'])->name("callback_transaction");
Route::post('callback_error', [TransactionController::class, 'callback_error']);
