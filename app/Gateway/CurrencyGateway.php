<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 03.12.2017
 * Time: 10:34 PM
 */

namespace App\Gateways;

use GuzzleHttp\Client;


class CurrencyGateway
{

    public function getCurrencies($currency)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $comments = $client->get('https://api.coinmarketcap.com/v1/ticker', [
            'query' => [
                'convert' => $currency
            ]
        ]);

        return $comments;
    }
}