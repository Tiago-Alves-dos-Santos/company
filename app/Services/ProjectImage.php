<?php

namespace App\Services;

use App\Traits\PublicUpload;


final class ProjectImage
{
    use PublicUpload;
    private ?Project $project = null;

    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function upload($files)
    {
    }
}
