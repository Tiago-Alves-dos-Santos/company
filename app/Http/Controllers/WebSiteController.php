<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Facade\ServiceFactory;

class WebSiteController extends Controller
{
    public function index()
    {
        $tag = ServiceFactory::createTag();
        $tags_value = $tag->getTagsValues();
        return view('index', [
            'tags_value' => $tags_value,
            'services' => Services::cursor()
        ]);
    }
}
