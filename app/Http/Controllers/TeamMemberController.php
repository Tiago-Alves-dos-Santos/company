<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        return view('admin.team_member.index');
    }
}
