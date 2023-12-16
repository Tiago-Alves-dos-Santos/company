<?php
namespace App\Services;

use App\Services\Tag;
use App\Services\Company;
use App\Services\Service;

final class ServiceFactory
{
    public function createCompany()
    {
        return new Company();
    }
    public function createTag()
    {
        return new Tag();
    }
    public function createService()
    {
        return new Service();
    }
}
