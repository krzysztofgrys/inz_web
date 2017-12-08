<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 03.12.2017
 * Time: 10:34 PM
 */

namespace App\Gateways;

use GuzzleHttp\Client;


class EntitiesGateway
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


    public function addEntity($user, $title, $description, $thumbnail, $url)
    {


        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->post(env('API') . '/v1/entity', [
            'form_params' => [
                'title'       => $title,
                'description' => $description,
                'thumbnail'   => $thumbnail,
                'url'         => $url,
            ]
        ]);

        return $result;
    }

    public function getEntity($entity)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $result = $client->get(env('API') . '/v1/entity/' . $entity);

        return $result;
    }

    public function deleteEntity($user, $id)
    {
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);

        $result = $client->delete(env('API') . '/v1/entity/' . $id);

        return $result;
    }

    public function authenticatedGetEntity(){

    }
}