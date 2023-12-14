<?php

namespace App\Services;

use App\Models\Content;
use App\Models\Tag as ModelTag;

final class Tag
{
    public function create(array $data) :void
    {
        $tag = ModelTag::create($data);
        Content::create([
            'tag_id' => $tag->id,
        ]);
    }

    public function getTagsValues() :array
    {
        $tags = ModelTag::get();
        $tags_value = [];
        foreach ($tags as $value) {
            $tags_value[$value->title] = (object) json_decode($value->content->content);
        }
        return $tags_value;
    }
}
