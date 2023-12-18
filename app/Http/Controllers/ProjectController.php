<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }
    public function viewCreate()
    {
        return view('admin.project.create');
    }
    public function viewUpdate(Projects $project)
    {
        return view('admin.project.update', [
            'project' => $project
        ]);
    }
}
