<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 29.11.2017
 * Time: 1:40 AM
 */


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('top');
    }


    public function search(Request $request)
    {

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->post(env('API') . '/v1/user_autocomplete', [
            'form_params' => [
                'userName' => $request->get('search'),

            ]
        ]);

        return $result->getBody()->getContents();
    }


    public function show($id)
    {
        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->post(env('API') . '/v1/user_autocomplete', [
            'form_params' => [
                'userName' => $request->get('search'),

            ]
        ]);

        return $result->getBody()->getContents();

    }

}