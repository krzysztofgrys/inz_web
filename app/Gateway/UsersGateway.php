<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 03.12.2017
 * Time: 10:33 PM
 */


namespace App\Gateways;

use GuzzleHttp\Client;


class UsersGateway
{

    public function getEntities()
    {

        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/entity');

        return $result;
    }

}