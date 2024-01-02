<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\CustomerCompany;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $feedback_rating = [
            'one' => Feedback::where('rating', 1)->count(),
            'two' => Feedback::where('rating', 2)->count(),
            'three' => Feedback::where('rating', 3)->count(),
            'four' => Feedback::where('rating', 4)->count(),
            'five' => Feedback::where('rating', 5)->count()
        ];
        $columnFeedbackChart = (new ColumnChartModel())
            ->setTitle('Avaliação')
            ->addColumn('1', $feedback_rating['one'], '#f47855')
            ->addColumn('2', $feedback_rating['two'], '#fc8181')
            ->addColumn('3', $feedback_rating['three'], '#f4c13f')
            ->addColumn('4', $feedback_rating['four'], '#90cdf4')
            ->addColumn('5', $feedback_rating['five'], '#5c95f2')
            ->withDataLabels();
        return view('admin.dashboard', [
            'count' => (object) [
                'projects' => Projects::count(),
                'clients' => Client::count(),
                'conatct_unread' => Contact::where('isRead', false)->count(),
                'clients_company' => CustomerCompany::count()
            ],
            'columnFeedbackChart' => $columnFeedbackChart,
            'feedback' => (object) [
                'invisible' => Feedback::where('visible', false)->count(),
                'avg' => number_format(Feedback::avg('rating'), 1, '.'),
            ]
        ]);
    }
}
