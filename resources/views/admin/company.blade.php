@extends('layout.admin', ['tab_title' => 'Empresa'])

@section('title', 'Empresa')

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Soluções Software">
                <livewire:admin.company>
            </x-card.header>
        </div>
    </div>
@endsection
