<?php

namespace App\Livewire\Admin;

use App\Facade\ServiceFactory;
use Livewire\Component;

use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\Company as CompanyModel;
use Livewire\Attributes\Validate;

class Company extends Component
{
    use WithFileUploads, Actions;

    public ?string $name;
    public ?string $cnpj;
    // #[Validate('required|image|mimes:jpg,png,jpeg')]
    public $logo;

    public function save()
    {
        $company = ServiceFactory::createCompany();
        $this->validate([
            'name' => ['required', 'min:5'],
            'cnpj' => ['required', 'min:18'],
            'logo' => ['required','image','mimes:jpg,png,jpeg']
        ]);
        $data = [
            'name' => $this->name,
            'cnpj' => $this->cnpj
        ];
        try {
            $company->save($data, $this->logo);
            $this->notification()->success('Sucesso', 'Empresa atualizada com sucesso');
        } catch (\Exception $e) {
            $this->dialog()->error('Error', $e->getMessage());
        }
    }
    public function render()
    {
        $company = CompanyModel::first();
        $this->name = $company->name ?? '';
        $this->cnpj = $company->cnpj ?? '';

        return view('livewire.admin.company', [
            'company' => $company
        ]);
    }
}
