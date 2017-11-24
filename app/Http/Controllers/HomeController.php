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

        $client = new Client([
            'headers' => [
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API').'/v1/entity');

        return view('home', ['datas'=> json_decode($result->getBody()->getContents())->data]);
    }

    public function show($id){
        $client = new Client([
            'headers' => [
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->get(env('API').'/v1/entity/'.$id);

        return view('entity', ['data'=> json_decode($result->getBody()->getContents())->data[0]]);
    }


}
