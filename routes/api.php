<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\ServiceController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Auth





Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('api_login');
    Route::post('register', [AuthController::class, 'register'])->name('api.register');

    Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
	  Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
    
    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');
      Route::get('user', [AuthController::class, 'user'])->name('api.user');
    });
});

// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::post('transaction/callback/{status}', [ServiceController::class, 'callback_status'])->name("callback_transaction_status");
Route::post('transaction/callback_full', [ServiceController::class, 'callback'])->name("callback_transaction");
Route::post('transaction/status', [ServiceController::class, 'status'])->name("transaction_status");
