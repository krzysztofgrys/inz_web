<?php

namespace App\Http\Controllers\Auth;

use App\Authentication\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(){
        dd(1);
    }

    public function authenticate(){
        dd(1);
    }

    public function authorize($ability, $arguments = [])
    {
        dd(1);
    }

    public function login(Request $request)
    {
//        $this->validateLogin($request);

//        $client = new Client();
//        $result = $client->post(env('API').'/v1/login', [
//            'form_params' => [
//                'email'     => $request['email'],
//                'password'    => $request['password'],
//            ]
//        ]);

//        if($result->getStatusCode() == 200){
//            $user = json_decode($result->getBody()->getContents())->success;

            $user = Auth::attempt([
                'email'     => $request['email'],
                'password'    => $request['password'],
            ]);

            $user = Auth::user();

            return view('login_success');
        }

//        return view('login_failed');

//    }
}
