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

    public function index()
    {


        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result = $client->get(env('API') . '/v1/messages', ['http_errors' => false]);

        return view('messages', ['messages' => json_decode($result->getBody()->getContents())->data]);

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


        $result = $client->get(env('API') . '/v1/messages/' . $id, ['http_errors' => false]);

        $data = json_decode($result->getBody()->getContents())->data;

        return view('message', ['messages' => $data->messages, 'receiver' => $data->receiver, 'sender' => $data->sender]);
    }


    public function newConversation(Request $request)
    {

        return view('new_message');

    }


    public function sendMessage(Request $request)
    {

        $receiver = $request->get('receiver');
        $message  = $request->get('body');

        $user = Auth::user();

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result = $client->post(env('API') . '/v1/messages', [
            'form_params' => [
                'receiver' => $receiver,
                'message'  => $message,
            ],
            'http_errors' => false
        ]);

//        dd($result->getBody()->getContents());
//        $result = json_decode($result->getBody()->getContents());
//
//        if (isset($result->error)) {
//            abort(404, 'Brak wpisu o danym ID');
//        }


        return redirect()->route('message', ['id' => $result->getBody()->getContents()]);
    }
}