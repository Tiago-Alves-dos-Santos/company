<?php
namespace App\Facade;

use App\Helpers\AuthClient as HelpersAuthClient;
use Illuminate\Support\Facades\Facade;

final class AuthClient extends Facade
{
    protected static function getFacadeAccessor(){
        return HelpersAuthClient::class;
    }
}
