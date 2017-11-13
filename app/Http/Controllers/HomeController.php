<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API').'/v1/entity');

        return view('home', ['datas'=> json_decode($result->getBody()->getContents())->data]);
    }

    public function show($id){
        $user = Auth::user();
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API').'/v1/entity/'.$id);

        return view('entity', ['datas'=> json_decode($result->getBody()->getContents())->data]);
    }


}
