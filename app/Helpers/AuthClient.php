<?php
namespace App\Helpers;

use App\Models\Client;

/**
 * Have facade 'AuthClient'
 */
final class AuthClient
{
    private Client $client;
    public function check():bool
    {
        return session()->has('login_client') && session('login_client');
    }
    public function login(Client $client):void
    {
        session([
            'client' => $client,
            'login_client' => true
        ]);
    }
    public function logout():void
    {
        session()->flush();
    }
}
