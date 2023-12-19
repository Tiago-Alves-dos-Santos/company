<?php

namespace App\Livewire\Admin\CustomerCompany;

use App\Models\CustomerCompany;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.admin.customer-company.table',[
            'customers_company' => CustomerCompany::cursor()
        ]);
    }
}
