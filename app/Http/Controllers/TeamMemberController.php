<?php

namespace App\Http\Controllers;

use App\Models\TeamMembers;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        return view('admin.team_member.index');
    }
    public function viewCreate()
    {
        return view('admin.team_member.create');
    }
    public function viewUpdate(TeamMembers $member)
    {
        return view('admin.team_member.update', [
            'member' => $member
        ]);
    }
}
