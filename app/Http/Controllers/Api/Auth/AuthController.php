<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function response($user, $code=200, $page=null){
        $token = $user->createToken(str()->random(40))->plainTextToken;
        return response()->json([
            'page' => $page??route('dashboard-acceuil'),
            'message' => 'L\'utilisateur a été créé avec succès!',
            'accessToken'=> $token,
            'user'=> $user,
            'token_type'=> 'Bearer',
        ], $code);
    }

    /**
    * Create user
    *
    * @param  [string] name
    * @param  [string] email
    * @param  [string] password
    * @param  [string] password_confirmation
    * @return [string] message
    */
    public function register(Request $request)
    {
       //try{
            $request->validate([
                'name' => 'required|string',
                'email'=>'required|string|unique:users',
                'password'=>'required',
                'password_confirmation' => 'required|same:password'
            ]);

            $user = new User([
                'name'  => ucwords($request->name),
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($user->save()) {
                return $this->response($user, 201);
            } else {
                return response()->json(['error'=>'Provide proper details']);
            }
        /*
        }catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        */
    }

    /**
     * Login user and create token
    *
    * @param  [string] email
    * @param  [string] password
    * @param  [boolean] remember_me
    */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string|min:4',
            'remember_me' => 'boolean'
        ]);
        // $credentials = $request([['email', 'password',]]);
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password],  $request->remember_me))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ],401);

            // throw ValidationException::withMessages([
			// 	'email' => ['The provided credentials are incorrect.'],
			// ]);
        }

        return $this->response(Auth::user());
    }


    /**
     * Get the authenticated User
    *
    * @return [json] user object
    */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        Auth::guard('web')->logout();


        return response()->json([
            'message' => 'Successfully logged out',
            'status' => true
        ]);

    }

    public function send_password_reset_link_email(Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		if($status === Password::RESET_LINK_SENT) {
			return response()->json(['message' => __($status)], 200);
		} else {
			throw ValidationException::withMessages([
				'email' => __($status)
			]);
		}
	}

	public function reset_password(Request $request) {
		$request->validate([
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:8|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) use ($request) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		if($status == Password::PASSWORD_RESET) {
			return response()->json(['message' => __($status)], 200);
		} else {
			throw ValidationException::withMessages([
				'email' => __($status)
			]);
		}
	}

}
