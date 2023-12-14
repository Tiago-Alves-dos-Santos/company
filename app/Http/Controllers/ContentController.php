<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function saveJson(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'content' => ['required'],
        ]);
        // dd(json_encode($request->content));
        Content::find((int) $request->id)->update([
            'content' => $request->content
        ]);
        return redirect()->back();
    }
}
