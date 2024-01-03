<?php

namespace App\Http\Controllers;

use App\Models\CustomerCompany;
use Illuminate\Http\Request;

class CustomerCompanyController extends Controller
{
    public function index()
    {
        return view('admin.customer_company.index');
    }
    public function viewCreate()
    {
        return view('admin.customer_company.create');
    }
    public function viewUpdate(CustomerCompany $customer)
    {
        return view('admin.customer_company.update', [
            'customer' => $customer
        ]);
    }
}
