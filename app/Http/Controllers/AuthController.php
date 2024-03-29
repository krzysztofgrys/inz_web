<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;


use App\Gateways\EntitiesGateway;
use App\Helpers\LayoutHelper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use App\Authentication\User;


class AuthController extends Controller
{


    public function auth(Request $request, $service)
    {
        LayoutHelper::flushAllMessages($request);
        $code   = $request->get('code');
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        $result = $client->get(env('API') . '/v1/login/' . $service . '/callback', [
            'query' => [
                'code' => $code
            ]
        ]);

        $user       = json_decode($result->getBody()->getContents())->data;
        $user       = new User($user);
        $this->user = $user;
        session()->push('user', $user);

        Auth::login($user, true);


        $request->session()->flash('info', 'Zalogowano pomyślnie');

        return redirect()->intended('/');

    }


    public function send($service)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/login/' . $service);

        return redirect($result->getBody()->getContents());
    }
}
