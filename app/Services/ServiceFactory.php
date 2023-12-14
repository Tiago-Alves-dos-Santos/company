<?php
namespace App\Services;

use App\Services\Tag;
use App\Services\Company;

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
}
