<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/13/17
 * Time: 6:23 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result        = $client->get(env('API') . '/v1/messages');

        return view('messages', ['messages' => json_decode($result->getBody()->getContents())->data]);

    }

    public function show($id){

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result        = $client->get(env('API') . '/v1/messages/'.$id);

        $data = json_decode($result->getBody()->getContents())->data;

        return view('message', ['messages' => $data->messages, 'receiver' => $data->receiver, 'sender' => $data->sender]);
    }
}