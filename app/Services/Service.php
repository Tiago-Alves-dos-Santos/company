<?php

namespace App\Services;

use App\Models\Services;
use App\Models\Tag as ModelTag;
use App\Services\Abstracts\TagContent;

final class Service extends TagContent
{
    public function __construct (){
        parent::__construct();
        $this->tag_name = 'tag_service';
    }
    /**
     * Create a new service
     *
     * @param array $data
     * @return Services
     */
    public function create(array $data): Services
    {
        parent::create($data);
        $service = Services::create([
            'tag_id' => $this->model_tag->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'icon' => $data['icon']
        ]);
        return $service;
    }
    /**
     * Update equal commun model
     *
     * @param integer $id
     * @param array $data
     * @return integer
     */
    public function update(int $id,array $data): int
    {
        parent::create($data);
        $rowaffecteds = Services::where('id', $id)->update([
            'tag_id' => $this->model_tag->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'icon' => $data['icon']
        ]);
        return $rowaffecteds;
    }

    public function existTagService():bool
    {
        return $this->tag->existTag($this->tag_name);
    }
    protected function createTagService(): ModelTag
    {
        return $this->tag->create([
            'title' => $this->tag_name ,
            'surname' => 'Controle de todos os conteudos'
        ]);
    }
}
