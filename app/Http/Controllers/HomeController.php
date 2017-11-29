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
        $this->middleware('auth', ['only' => ['rate']]);
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
                'Accept' => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/entity');

        return view('home', ['datas' => json_decode($result->getBody()->getContents())->data]);
    }

    public function show($id)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $result   = $client->get(env('API') . '/v1/entity/' . $id);
        $comments = $client->get(env('API') . '/v1/comment/' . $id);


        return view('entity',
            [
                'data'     => json_decode($result->getBody()->getContents())->data[0],
                'comments' => json_decode($comments->getBody()->getContents())->data
            ]
        );
    }

    public function rate($id)
    {

        $user   = Auth::user();
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->post(env('API') . '/v1/rate', [
            'form_params' => [
                'entityId' => $id
            ]
        ]);

        return $result->getBody()->getContents();
    }


    public function addComment(Request $request, $id){


        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result        = $client->post(env('API') . '/v1/comment', [
            'form_params' => [
                'entity'         => $id,
                'comment'   => $request->get('comment'),
            ]
        ]);

        return redirect()->route('showEntity', ['id' => $result->getBody()->getContents()]);
    }
}
