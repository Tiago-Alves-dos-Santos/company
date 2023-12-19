<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerCompanyController extends Controller
{
    public function index()
    {
        return view('admin.customer_company.index');
    }
}
