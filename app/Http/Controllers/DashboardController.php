<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\CustomerCompany;
use App\Models\Feedback;
use App\Models\Projects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard', [
            'count' => (object) [
                'projects' => Projects::count(),
                'clients' => Client::count(),
                'conatct_unread' => Contact::where('isRead', false)->count(),
                'clients_company' => CustomerCompany::count()
            ],
            'feedback' => (object) [
                'invisible' => Feedback::where('visible', false)->count(),
                'rating' => (object) [
                    'avg' => Feedback::avg('rating'),
                    'one' => Feedback::where('rating', 1)->count(),
                    'two' => Feedback::where('rating', 2)->count(),
                    'three' => Feedback::where('rating', 3)->count(),
                    'four' => Feedback::where('rating', 4)->count(),
                    'five' => Feedback::where('rating', 5)->count()
                ]
            ]
        ]);
    }
}
