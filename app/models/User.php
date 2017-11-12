<?php
/**
 * Created by PhpStorm.
 * User: krzysztofgrys
 * Date: 11/12/17
 * Time: 1:16 AM
 */

namespace App\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;
class User implements Authenticatable
{
    public  $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getAuthIdentifier()
    {
        return $this->user->user->id;
    }
    public function getAuthIdentifierName()
    {
        return 'getAuthIdentifierName';
    }
    public function getAuthPassword()
    {
        return 'getAuthPassword';
    }
    public function getRememberToken()
    {
        return 'setRememberToken';
    }
    public function getRememberTokenName()
    {
        return 'setRememberToken';
    }
    public function setRememberToken($value)
    {
        return 'setRememberToken';
    }

}