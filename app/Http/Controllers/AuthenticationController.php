<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    // Login basic
    public function login()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-login', ['pageConfigs' => $pageConfigs]);
        // return view('/auth/auth-login-cover', ['pageConfigs' => $pageConfigs]);
    }

    // Register basic
    public function register()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-register', ['pageConfigs' => $pageConfigs]);
        // return view('/auth/auth-register-cover', ['pageConfigs' => $pageConfigs]);
    }

    // register multi steps
    public function register_multi_steps()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-register-multisteps', ['pageConfigs' => $pageConfigs]);
    }

    // Forgot Password basic
    public function forgot_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/passwords/auth-forgot-password', ['pageConfigs' => $pageConfigs]);
    }

    // Reset Password basic
    public function reset_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-reset-password', ['pageConfigs' => $pageConfigs]);
    }

  

    // email verify basic
    public function verify_email()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-verify-email', ['pageConfigs' => $pageConfigs]);
    }

 
    // two steps basic
    public function two_steps()
    {
        $pageConfigs = ['blankPage' => true];

        return view('/auth/auth-two-steps', ['pageConfigs' => $pageConfigs]);
    }


}
