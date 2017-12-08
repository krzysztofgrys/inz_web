<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 03.12.2017
 * Time: 10:34 PM
 */

namespace App\Gateways;

use GuzzleHttp\Client;


class CommentsGateway
{

    public function getComments($id)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $comments = $client->get(env('API') . '/v1/comment/' . $id);

        return $comments;
    }


    public function addComment($user, $id, $comment)
    {

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $user->getRememberToken(),
                'Accept'        => 'application/json'
            ]
        ]);


        $result = $client->post(env('API') . '/v1/comment', [
            'form_params' => [
                'entity'  => $id,
                'comment' => $comment,
            ]
        ]);

        return $result;
    }
}