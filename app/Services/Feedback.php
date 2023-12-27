<?php
namespace App\Services;

use App\Models\Feedback as ModelFeedback;
use App\Models\Tag;
use App\Services\Abstracts\WebSiteSections;

final class Feedback extends WebSiteSections
{
    public function __construct (){
        parent::__construct();
        $this->tag_name = 'tag_feedback';
    }
    /**
     * Create a new service
     *
     * @param array $data
     * @return ModelFeedback
     */
    public function create(array $data): ModelFeedback
    {
        parent::createParent();
        $data = [
            'tag_id' => $this->model_tag->id,
            ...$data
        ];
        $feedback = ModelFeedback::create($data);
        return $feedback;
    }

    public function delete(int $id) {
        ModelFeedback::find($id)->delete();
    }
    public function existTagService():bool
    {
        return $this->tag->existTag($this->tag_name);
    }
    protected function createTagService(): Tag
    {
        return $this->tag->create([
            'title' => $this->tag_name ,
            'surname' => 'Controle de todos os conteudos'
        ]);
    }
}
