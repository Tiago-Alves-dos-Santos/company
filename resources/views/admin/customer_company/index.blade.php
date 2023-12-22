@extends('layout.admin', ['tab_title' => 'Empresa Cliente'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Empresas de clientes">
                <div class="flex justify-end">
                    <x-custom.button :link="route('customer_company.viewCreate')">
                        Novo
                    </x-custom.button>
                </div>
                <livewire:admin.customer-company.table></livewire:admin.customer-company.table>
                <div>
                    <h3 class="text-lg text-indigo-400">Para o slide funcionar são necessarios 5 registros de 'empresas de clientes'</h3>
                </div>
            </x-card.header>
        </div>
    </div>
@endsection
