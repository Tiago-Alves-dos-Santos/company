<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get(['id','title','surname']);
        // dd($tags);
        return view('admin.tag', compact('tags'));
    }
}
