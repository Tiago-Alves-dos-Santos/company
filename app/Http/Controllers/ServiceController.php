<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.service.index');
    }

    public function viewCreate(Request $request)
    {
        return view('admin.service.create');
    }
    public function viewUpdate(Request $request)
    {
        # code...
    }
}
