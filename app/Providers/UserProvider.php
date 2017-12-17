<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 12:55 AM
 */

namespace App\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Authentication\User;
use Illuminate\Support\Facades\Redirect;

class UserProvider implements \Illuminate\Contracts\Auth\UserProvider
{
    protected $user;

    public function retrieveByCredentials(array $credentials)
    {
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        try {
            $result = $client->post(env('API') . '/v1/login', [
                'form_params' => $credentials,
            ]);
        } catch (RequestException $e) {
            $user = (object)[
                'user'=>(object)[
                    'id'=>0
                ]
            ];
            return new User($user);
        }
        $result = json_decode($result->getBody()->getContents());

        $user = $result->data;
        $user = new User($user);

        $this->user = $user;
        session()->push('user', $user);

        return $user;
    }

    public function retrieveById($identifier)
    {
        if (($user = session()->get('user'))) {
            return $user[0];
        }

        return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        return 'retrieveByToken';

    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        return 'setRememberToken';

    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $client = new Client();

        try {
        $result = $client->post(env('API') . '/v1/login', [
            'form_params' => $credentials
        ]);
        } catch (RequestException $e) {
            return false;
        }

        $user1 = json_decode($result->getBody()->getContents())->data;
        $user1 = new User($user1);

        if ($user->getAuthIdentifier() == $user1->getAuthIdentifier()) {
            return true;
        }
        return false;
    }

}