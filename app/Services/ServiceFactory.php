<?php
namespace App\Services;

use App\Services\Company;

final class ServiceFactory
{
    public function createCompany()
    {
        return new Company();
    }
}
