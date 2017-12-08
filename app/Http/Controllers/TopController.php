<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TopController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/top');
        return view('top', ['datas' => json_decode($result->getBody()->getContents())->data]);
    }


    public function show($time)
    {


        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);


        $result = $client->get(env('API') . '/v1/top/' . $time);

        return view('top', ['datas' => json_decode($result->getBody()->getContents())->data]);
    }
}