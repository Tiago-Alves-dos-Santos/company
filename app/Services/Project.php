<?php

namespace App\Services;

use App\Models\Projects;
use App\Services\ProjectImage;
use App\Models\Tag as ModelTag;
use App\Services\Abstracts\WebSiteSections;


final class Project extends WebSiteSections
{
    private ?ProjectImage $images = null;
    public function __construct()
    {
        parent::__construct();
        $this->tag_name = 'tag_projects';
        $this->images = new ProjectImage();
    }
    /**
     * Returns an object from the created project and its images: 'null','object' or 'array of objects' .
     * Returns the number of photos that were uploaded
     * @param array $data
     * @param integer $categoria_id
     * @param [files] $files
     * @return object
     */
    public function create(array $data, int $categoria_id, $files = null): object
    {
        parent::createParent($data);
        $project = Projects::create([
            // 'tag_id' => $this->model_tag->id,
            'project_category_id' => $categoria_id,
            'title' => $data['title'],
            'description' => $data['description'],
            'client_name' => $data['client_name'],
            'website' => $data['website'],
            'company_name' => $data['company_name'],
        ]);
        $project = $project->fresh();
        $this->images->setProject($project);
        $images = null;
        if (!empty($files)) {
            $images = $this->images->upload($files);
        }
        return (object)[
            'project' => $project,
            'images' => $images,
            'count_images' => count($images),
        ];
    }

    public function update(int $id, array $data):int
    {
        return Projects::where('id', $id)->update($data);
    }
    public function delete(int $id)
    {
        $project = Projects::with('projectsImage')->find($id);
        foreach ($project->projectsImage as $value) {
            $this->images->delete($value->id);
        }
        $project->delete();
    }

    public function existTagService(): bool
    {
        return $this->tag->existTag($this->tag_name);
    }
    protected function createTagService(): ModelTag
    {
        return $this->tag->create([
            'title' => $this->tag_name,
            'surname' => 'Projetos de clientes, já concluidos ou em andamento.'
        ]);
    }

}
