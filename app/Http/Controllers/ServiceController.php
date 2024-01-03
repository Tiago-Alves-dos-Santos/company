<?php

namespace App\Http\Controllers;

use App\Models\Services;
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
    public function viewUpdate(Services $service)
    {
        return view('admin.service.update', [
            'service' => $service
        ]);
    }
}
