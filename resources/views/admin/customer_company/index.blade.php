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
                <livewire:admin.customer-company.table>
            </x-card.header>
        </div>
    </div>
@endsection
