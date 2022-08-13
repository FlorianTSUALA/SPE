<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\PagesController;
// use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ServiceSamedController;
use App\Http\Controllers\ServiceKredigoController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();
//https://github.com/laravel/ui/blob/3.x/src/AuthRouteMethods.php
/*
    // Login Routes...
    if ($options['login'] ?? true) {
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
    }

    // Logout Routes...
    if ($options['logout'] ?? true) {
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    }

    // Registration Routes...
    if ($options['register'] ?? true) {
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');
    }

    // Password Reset Routes...
    if ($options['reset'] ?? true) {
        $this->resetPassword();
    }

    // Password Confirmation Routes...
    if ($options['confirm'] ??
        class_exists($this->prependGroupNamespace('Auth\ConfirmPasswordController'))) {
        $this->confirmPassword();
    }

    // Email Verification Routes...
    if ($options['verify'] ?? false) {
        $this->emailVerification();
    }

*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/connexion', [AuthenticationController::class, 'login'])->name('login');
Route::get('/inscription', [AuthenticationController::class, 'register'])->name('register');
Route::get('/inscription/etape', [AuthenticationController::class, 'register_multi_steps'])->name('register_multi_steps');

   /* Route Authentication Pages */
Route::group(['prefix' => 'auth'], function () {
    Route::get('login-basic', [AuthenticationController::class, 'login_basic'])->name('auth-login-basic');
    Route::get('login-cover', [AuthenticationController::class, 'login_cover'])->name('auth-login-cover');
    Route::get('register-basic', [AuthenticationController::class, 'register_basic'])->name('auth-register-basic');
    Route::get('register-cover', [AuthenticationController::class, 'register_cover'])->name('auth-register-cover');
    Route::get('forgot-password-basic', [AuthenticationController::class, 'forgot_password_basic'])->name('auth-forgot-password');
    Route::get('forgot-password-cover', [AuthenticationController::class, 'forgot_password_cover'])->name('auth-forgot-password-cover');
    Route::get('reset-password-basic', [AuthenticationController::class, 'reset_password_basic'])->name('auth-reset-password-basic');
    Route::get('reset-password-cover', [AuthenticationController::class, 'reset_password_cover'])->name('auth-reset-password-cover');
    Route::get('verify-email-basic', [AuthenticationController::class, 'verify_email_basic'])->name('auth-verify-email-basic');
    Route::get('verify-email-cover', [AuthenticationController::class, 'verify_email_cover'])->name('auth-verify-email-cover');
    Route::get('two-steps-basic', [AuthenticationController::class, 'two_steps_basic'])->name('auth-two-steps-basic');
    Route::get('two-steps-cover', [AuthenticationController::class, 'two_steps_cover'])->name('auth-two-steps-cover');
    Route::get('register-multisteps', [AuthenticationController::class, 'register_multi_steps'])->name('auth-register-multisteps');
    Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('auth-lock_screen');
});

Route::group(['prefix' => 'service'], function () {
    Route::get('kredigo', [ServiceKredigoController::class, 'index'])->name('service-kredigo');
    Route::post('kredigo/transaction', [ServiceKredigoController::class, 'transation'])->name('service-kredigo-transation');
    Route::get('samed', [ServiceSamedController::class, 'index'])->name('service-samed');
    Route::post('samed/transaction', [ServiceSamedController::class, 'transation'])->name('service-samed-transation');
    Route::get('condition', [ServiceSamedController::class, 'condition'])->name('service-condition');
});


Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-acceuil');

    Route::get('/admin/service/{service}', [DashboardController::class, 'dashboardAdmin'])->name('services');

    // locale Route
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);

    /* Route Dashboards */
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('analytics', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-analytics');
    });
    /* Route Dashboards */

    /* Route Apps */
    Route::group(['prefix' => 'app'], function () {
        Route::get('user/list', [AppsController::class, 'user_list'])->name('app-user-list');
        Route::get('user/view/account', [AppsController::class, 'user_view_account'])->name('app-user-view-account');
        Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app-user-view-security');
        Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app-user-view-billing');
        Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app-user-view-notifications');
        Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections');
    });
    /* Route Apps */


    /* Route Pages */
    Route::group(['prefix' => 'page'], function () {
        Route::get('account-settings-account', [PagesController::class, 'account_settings_account'])->name('page-account-settings-account');
        Route::get('account-settings-security', [PagesController::class, 'account_settings_security'])->name('page-account-settings-security');
        Route::get('account-settings-billing', [PagesController::class, 'account_settings_billing'])->name('page-account-settings-billing');
        Route::get('account-settings-notifications', [PagesController::class, 'account_settings_notifications'])->name('page-account-settings-notifications');
        Route::get('account-settings-connections', [PagesController::class, 'account_settings_connections'])->name('page-account-settings-connections');
        Route::get('profile', [PagesController::class, 'profile'])->name('page-profile');

        // Miscellaneous Pages With Page Prefix
        // Route::get('coming-soon', [MiscellaneousController::class, 'coming_soon'])->name('misc-coming-soon');
        // Route::get('not-authorized', [MiscellaneousController::class, 'not_authorized'])->name('misc-not-authorized');
        // Route::get('maintenance', [MiscellaneousController::class, 'maintenance'])->name('misc-maintenance');
    });

    /* Modal Examples */
    Route::get('/modal-examples', [PagesController::class, 'modal_examples'])->name('modal-examples');

    /* Route Pages */
    // Route::get('/error', [MiscellaneousController::class, 'error'])->name('error');



});

