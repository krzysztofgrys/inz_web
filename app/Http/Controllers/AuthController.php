<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;


use App\Gateways\EntitiesGateway;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class AuthController extends Controller
{


    public function auth(Request $request, $service)
    {

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


    }

}
