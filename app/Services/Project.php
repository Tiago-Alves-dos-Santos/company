<?php
namespace App\Services;

use App\Models\Projects;
use App\Services\ProjectImage;
use App\Models\Tag as ModelTag;
use Illuminate\Http\UploadedFile;
use App\Services\Abstracts\WebSiteSections;


final class Project extends WebSiteSections
{
    private ?ProjectImage $images = null;
    public function __construct (){
        parent::__construct();
        $this->tag_name = 'tag_projects';
        $this->images = new ProjectImage();
    }
    public function create(array $data, int $categoria_id, $files = null)
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
        ds()->clear();
        if(!empty($files)){
            $this->images->upload($files);
        }
    }
    public function existTagService():bool
    {
        return $this->tag->existTag($this->tag_name);
    }
    protected function createTagService(): ModelTag
    {
        return $this->tag->create([
            'title' => $this->tag_name ,
            'surname' => 'Projetos de clientes, já concluidos ou em andamento.'
        ]);
    }
}
