<?php

namespace App\Livewire\Admin;

use App\Models\Company as CompanyModel;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;

class Company extends Component
{
    use WithFileUploads, Actions;

    public string $name;
    public string $cnpj;
    public $logo;

    public function save()
    {
        $this->validate([
            'name' => ['required', 'min:5'],
            'cnpj' => ['required'],
        ]);
        $data = [
            'name' => $this->name,
            'cnpj' => $this->cnpj
        ];
        try {
            if(CompanyModel::count() == 0){
                CompanyModel::create($data);
            }else{
                CompanyModel::first()->update($data);
            }
            $this->notification()->success('Sucesso', 'Empresa atualizada com sucesso');
        } catch (\Exception $e) {
            $this->dialog()->error('Error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.company');
    }
}
