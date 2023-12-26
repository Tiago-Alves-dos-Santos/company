@extends('layout.admin', ['tab_title' => 'Projetos'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Projetos">
                <div class="flex justify-end">
                    <x-custom.button :link="route('project.viewCreate')">
                        Novo
                    </x-custom.button>
                </div>
                <livewire:admin.project.table>
            </x-card.header>
        </div>
    </div>
@endsection
