@extends('layout.admin', ['tab_title' => 'Empresa cliente'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Editar Empresa de cliente">
                <livewire:admin.customer-company.form-update :customer="$customer">
            </x-card.header>
        </div>
    </div>
@endsection
