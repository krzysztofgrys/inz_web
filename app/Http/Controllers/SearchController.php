<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:24 PM
 */

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('search');
    }


    public function show(Request $request)
    {

        $client = new Client([
            'Accept' => 'application/json'
        ]);

        $type = 'entry';

        $phase = $request->get('search');

        if (strpos($phase, '@') !== false) {
            $type  = 'profile';
            $phase = str_replace('@', '', $phase);
        }

        $result = $client->get(env('API') . '/v1/search/' . $phase, [
            'query' => [
                'type' => $type
            ]
        ]);

        $result = json_decode($result->getBody()->getContents());


        if (empty($result->users) && empty($result->entries)) {
            $request->session()->flash('error', 'Brak wyników.');
        }


        return view('search', ['data' => $result]);
    }
}