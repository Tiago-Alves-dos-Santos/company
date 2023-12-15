<?php

namespace App\Services\Abstracts;

use App\Services\Tag;
use App\Facade\ServiceFactory;
use App\Models\Tag as ModelTag;

abstract class TagContent
{
    protected ?Tag $tag = null;
    protected ?ModelTag $model_tag = null;
    protected string $tag_name = '';
    public function __construct()
    {
        $this->tag = ServiceFactory::createTag();
        $this->model_tag = new ModelTag();
    }
    public function create(array $data)
    {
        $this->model_tag = $this->createTag();
    }
    /**
     * Check existence of service tag
     *
     * @return boolean
     */
    public abstract function existTagService(): bool;
    protected abstract function createTagService(): ModelTag;
    private function createTag(): ModelTag
    {
        $tag = null;
        if (!$this->existTagService()) {
            $tag = $this->createTagService();
        } else {
            $tag = ModelTag::where('title', $this->tag_name)->first();
        }
        return $tag;
    }
}
