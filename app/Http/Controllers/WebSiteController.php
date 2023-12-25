<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Facade\ServiceFactory;
use App\Models\CustomerCompany;
use App\Models\ProjectCategory;
use App\Models\ProjectImages;

class WebSiteController extends Controller
{
    public function index()
    {
        $tag = ServiceFactory::createTag();
        $tags_value = $tag->getTagsValues();
        $images = ProjectImages::cursor();
        $customer_company = CustomerCompany::cursor();
        $team = ServiceFactory::createTeamMember();
        return view('index', [
            'tags_value' => $tags_value,
            'services' => Services::cursor(),
            'categories' => ProjectCategory::cursor(),
            'images' => $images,
            'customer_company' => $customer_company,
            'team' => $team->getAll()
        ]);
    }
}
