<?php

namespace App\Http\Controllers;

use App\Facade\ServiceFactory;
use App\Models\Tag;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    public function index()
    {
        $tag = ServiceFactory::createTag();
        $tags_value = $tag->getTagsValues();
        return view('index', compact('tags_value'));
    }
}
