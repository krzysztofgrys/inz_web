<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 03.12.2017
 * Time: 10:33 PM
 */


namespace App\Gateways;

use GuzzleHttp\Client;


class RateGateway
{

    public function rateEntity($user, $id)
    {

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

        return $result;

    }

}