<?php
namespace App\Facade;

use Illuminate\Support\Facades\Facade;
use App\Services\ServiceFactory as ServiceFactoryMain;

final class ServiceFactory extends Facade
{
    protected static function getFacadeAccessor(){
        return ServiceFactoryMain::class;
    }
}
