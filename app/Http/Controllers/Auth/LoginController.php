<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin()
    {
        dd(1);
    }

    public function authenticate()
    {
        dd(1);
    }

    public function authorize($ability, $arguments = [])
    {
        dd(1);
    }

    public function login(Request $request)
    {
        $user = Auth::attempt([
            'email'    => $request['email'],
            'password' => $request['password'],
        ]);

        if ($user == false) {
            $request->session()->flash('error', ['title' => 'Błąd', 'content' => 'Nieprawidłowy e-mail lub hasło']);

            return redirect()->intended('/login');
        }

        $user = Auth::user();

        $request->session()->flash('info', ['title' => 'Zalogowano pomyślnie', 'content' => 'Witaj ' . $user->user->user->name]);

        return redirect()->intended('/');
    }
}
