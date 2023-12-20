<?php

namespace App\Livewire\Admin\CustomerCompany;

use App\Facade\ServiceFactory;
use App\Models\CustomerCompany;
use Livewire\Component;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;
    public function delete(int $id)
    {
        $customer = ServiceFactory::createCustomerCompany();
        $customer->delete($id);
        $this->notification()->success('Sucesso', 'Deletado com sucesso');
    }
    public function render()
    {
        return view('livewire.admin.customer-company.table',[
            'customers_company' => CustomerCompany::cursor()
        ]);
    }
}
