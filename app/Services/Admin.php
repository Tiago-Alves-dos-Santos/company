<?php
namespace App\Services;

use App\Models\User;

final class Admin
{
    public function create(array $data)
    {
        $admin = User::create($data);
        return $admin;
    }
}
