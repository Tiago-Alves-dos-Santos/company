<?php
namespace App\Services;

use App\Models\Tag as ModelTag;
use Illuminate\Http\UploadedFile;
use App\Services\Abstracts\WebSiteSections;


final class Project extends WebSiteSections
{
    private ?ProjectImage $images = null;
    private ?Category $category = null;
    public function __construct (){
        parent::__construct();
        $this->tag_name = 'tag_projects';
        $this->images = new ProjectImage();
        $this->category = new Category();
    }
    public function create(array $data, Category $category , UploadedFile $file)
    {
        parent::createParent($data);

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
