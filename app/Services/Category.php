<?php

namespace App\Services;

use App\Models\ProjectCategory;

final class Category
{
    private int $id = 0;
    public function create(array $data): ProjectCategory
    {
        return ProjectCategory::create($data);
    }
    public function setId(int $id){
        $this->id = $id;
    }
    /**
     * Returns an object with category value true or false. If you have projects, return the number of deleted projects with her(it)
     *
     * @param integer $id
     * @return object
     */
    public function delete(int $id = 0): object
    {
        $this->id = empty($this->id) ? $id : $this->id;
        $catgory = ProjectCategory::find($this->id);
        $result = [
            'projects_deleted' => 0,
            'category' => 0,
        ];
        if($catgory->hasProjects()){
            //delete the projects relateds with this category
        }
        $result['category'] = $catgory->forceDelete();
        return (object) $result;
    }
}
