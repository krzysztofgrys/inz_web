<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 12:55 AM
 */

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Authentication\User;

class UserProvider implements \Illuminate\Contracts\Auth\UserProvider
{
    protected $user;

    public function retrieveByCredentials(array $credentials)
    {
        $client = new Client();
        $result = $client->post(env('API').'/v1/login', [
            'form_params' => $credentials
        ]);
        $user = json_decode($result->getBody()->getContents())->success;
        $user = new User($user);
        $this->user = $user;
        return $user;
    }
    public function retrieveById($identifier)
    {
        $client = new Client();
        $result = $client->post(env('API').'/v1/login', [
            'form_params' => [
                'email'     => 'q@q.pl',
                'password'    => 'q',
            ]
        ]);
        $user = json_decode($result->getBody()->getContents())->success;
        $user = new User($user);
        $this->user = $user;
        return $user;

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
        $result = $client->post(env('API').'/v1/login', [
            'form_params' => $credentials
        ]);

        $user1 = json_decode($result->getBody()->getContents())->success;
        $user1 = new User($user1);

        if($user->getAuthIdentifier() == $user1->getAuthIdentifier()){
            return true;
        }
        return false;


    }

}