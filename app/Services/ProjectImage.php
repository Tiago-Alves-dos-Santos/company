<?php

namespace App\Services;

use App\Models\Projects;
use App\Traits\PublicUpload;
use App\Models\ProjectImages;
use Illuminate\Support\Facades\File;


final class ProjectImage
{
    use PublicUpload;
    private ?Projects $project = null;
    private $path = "img/project/";
    public function setProject(Projects $project)
    {
        $this->project = $project;
    }

    public function upload($files): array|ProjectImages
    {
        $images = null;
        if (count($files) > 1) {
            $images = [];
            foreach ($files as $value) {
                $newName = uniqid($this->project->id . "_");
                $this->uploadImage($value, $this->path, $newName);

                $images[] = ProjectImages::create([
                    'projects_id' => $this->project->id,
                    'title' => $this->project->title . " - " . $this->project->company_name,
                    'image' => $newName . '.' . $value->extension(),
                ]);
            }
        } else {
            $newName = uniqid($this->project->id . "_");
            $this->uploadImage($files[0], $this->path, $newName);
            $images = ProjectImages::create([
                'projects_id' => $this->project->id,
                'title' => $this->project->title . " - " . $this->project->company_name,
                'image' => $newName . '.' . $files[0]->extension(),
            ]);
        }
        return $images;
    }

    public function delete(int $id)
    {
        $image = ProjectImages::find($id);
        File::delete(public_path($this->path.$image->image));
        return $image->forceDelete();
    }

    public function listImagesToProject(int $project_id, int $paginate = 10)
    {

        $projectImages = ProjectImages::with('project')
            ->where('projects_id', $project_id)
            ->paginate($paginate);

        $projectImages->getCollection()->transform(function ($image) {
            $image->image = $this->path . $image->image;
            return $image;
        });
        return $projectImages;
    }
}
