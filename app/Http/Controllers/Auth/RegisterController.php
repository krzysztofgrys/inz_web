<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(Request $request)
    {

        $data = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (!$this->validator($data)) {
            $request->session()->flash('error', ['title' => 'Błąd', 'content' => 'Wprowadzone dane są niepoprawne']);

            return redirect()->back();
        }

        $client = new Client();

        try{
            $result = $client->post(env('API') . '/v1/register', [
                'form_params' => [
                    'name'       => $request['name'],
                    'email'      => $request['email'],
                    'password'   => $request['password'],
                    'c_password' => $request['password_confirmation']
                ]
            ]);
        }catch (RequestException $e){
            $request->session()->flash('error', ['title' => 'Błąd', 'content' => 'Wprowadzone dane są niepoprawne']);
            return redirect()->back();
        }

        $request->session()->flash('info', ['title' => 'Sukces', 'content' => 'Pomyślnie utworzono konto. Możesz się teraz zalogować']);

        return redirect()->intended('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return 1;
    }
}
