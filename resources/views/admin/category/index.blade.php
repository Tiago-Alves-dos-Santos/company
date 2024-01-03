@extends('layout.admin', ['tab_title' => 'Categoria'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Categoria Projetos">
                <livewire:admin.category>
            </x-card.header>
        </div>
    </div>
@endsection
