<?php
namespace App\Services;

use App\Services\Tag;
use App\Services\Company;
use App\Services\Project;
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
    public function createProjectCategory()
    {
        return new Category();
    }
    public function createProject()
    {
        return new Project();
    }
}
