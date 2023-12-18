<?php
namespace App\Services;
final class ProjectImage
{
    private ?Project $project = null;

    public function setProject(Project $project)
    {
        $this->project = $project;
    }
}
