<?php
namespace App\Services;

use App\Models\ProjectCategory;

final class Category
{
    public function create(array $data):ProjectCategory
    {
        return ProjectCategory::create($data);
    }
}
