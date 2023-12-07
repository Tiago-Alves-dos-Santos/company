<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class UserController extends Controller
{
    public function profileInformation(): View
    {
        return view('admin.auth.profile-information');
    }
}
