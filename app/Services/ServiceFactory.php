<?php
namespace App\Services;

use App\Services\Tag;
use App\Services\Company;
use App\Services\Project;
use App\Services\Service;
use App\Services\ProjectImage;
use App\Services\CustomerCompany;

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
    public function createProjectImage()
    {
        return new ProjectImage();
    }
    public function createCustomerCompany()
    {
        return new CustomerCompany();
    }
    public function createTeamMember()
    {
        return new TeamMember();
    }
    public function createAdmin()
    {
        return new Admin();
    }
}
