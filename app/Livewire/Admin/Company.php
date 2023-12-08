<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;

use Livewire\WithFileUploads;
use App\Facade\ServiceFactory;
use Illuminate\Validation\Rule;
use App\Models\Company as CompanyModel;

class Company extends Component
{
    use WithFileUploads, Actions;

    public ?string $name;
    public ?string $cnpj;
    public $logo = null;

    public function save()
    {
        $company = ServiceFactory::createCompany();
        $this->validate([
            'name' => ['required', 'min:5'],
            'cnpj' => ['required', 'min:18'],
            'logo' => [
                'nullable', 'image', 'mimes:jpg,png,jpeg',
                Rule::requiredIf(function () {
                    return is_null($this->logo) ? false : true;
                })
            ]
        ]);
        $data = [
            'name' => $this->name,
            'cnpj' => $this->cnpj
        ];
        try {
            empty($this->logo) ? $company->save($data) : $company->save($data, $this->logo);
            $this->notification()->success('Sucesso', 'Empresa atualizada com sucesso');
        } catch (\Exception $e) {
            $this->dialog()->error('Error', $e->getMessage());
        }
    }
    public function deleteLogo()
    {

        if(CompanyModel::count() > 0){
            ServiceFactory::createCompany()->deleteLogo();
        }
        $this->reset('logo');
        $this->notification()->info('Informação', 'Foto removida com sucesso');

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
