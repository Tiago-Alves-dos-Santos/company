<?php

namespace App\Services;

use App\Models\Content;
use App\Models\Tag as ModelTag;

final class Tag
{
    public function create(array $data): object
    {
        $tag = ModelTag::create($data);
        $content = Content::create([
            'tag_id' => $tag->id,
        ]);
        return (object) compact('tag', 'content');
    }
    public function createMany(array $data): object
    {
        $tags = ModelTag::insert($data) ? true:[];
        $contents = [];
        if ($tags) {
            $tags = ModelTag::get();
            foreach ($tags as $value) {
                $contents[] = Content::create([
                    'tag_id' => $value->id,
                ]);
            }
        }
        return (object) compact('tags');
    }

    public function getTagsValues(): array
    {
        $tags = ModelTag::get();
        $tags_value = [];
        foreach ($tags as $value) {
            $tags_value[$value->title] = (object) json_decode($value->content->content);
            $tags_value[$value->title]->visible = $value->visible;
        }
        return $tags_value;
    }
}
