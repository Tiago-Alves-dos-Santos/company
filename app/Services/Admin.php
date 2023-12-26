<?php
namespace App\Services;

use App\Models\User;

final class Admin
{
    public function delete(int $id)
    {
        User::where('id', $id)->delete();
    }
}
