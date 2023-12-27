@extends('layout.admin', ['tab_title' => 'Depoimentos'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Depoimentos">
                <div class="flex justify-end">
                    <x-custom.dropdown.button title="Filtro" context='info' icon='ri-filter-line'>
                        <x-custom.dropdown.link title="Ativos"></x-custom.dropdown.link>
                        <x-custom.dropdown.link title="Inativos"></x-custom.dropdown.link>
                        <x-custom.dropdown.link title="Excluidos"></x-custom.dropdown.link>
                    </x-custom.dropdown.button>
                </div>
                <div>
                    <h4 class="text-xl">
                        Filtro: Ativos
                    </h4>
                </div>
                <div>
                    <livewire:admin.feedback.table>
                </div>
            </x-card.header>
        </div>

    </div>
@endsection
