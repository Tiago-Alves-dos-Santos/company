<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ClientController extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }
}
