<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\UserProvider as IlluminateUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use GuzzleHttp\Client;
use App\User;

class ApiUserProvider implements IlluminateUserProvider
{
    /**
     * @param    mixed  $identifier
     * @return  \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        throw new \Exception('retrieveById');
    }

    /**
     * @param    mixed   $identifier
     * @param    string  $token
     * @return  \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        throw new \Exception('retrieveByToken');
    }

    /**
     * @param    \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param    string  $token
     * @return  void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        throw new \Exception('updateRememberToken');
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param    array  $credentials
     * @return  \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        try{
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://vps13596.publiccloud.com.br/homolog_clickApi/api_click/public/api/',
            ]);
    
            $response = $client->post('login', ['form_params' => [
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ]]);

            $auth = json_decode($response->getBody());
            $user = new User();
            $user->email = $credentials['email'];
            $user->auth = $auth;
            return $user;

        } catch(\Exception $e) {
            throw $e;
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param    \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param    array  $credentials
     * @return  bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
    }
}