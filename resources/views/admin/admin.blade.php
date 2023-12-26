@extends('layout.admin', ['tab_title' => 'Admin'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Administradores">
                <livewire:admin.admin.table>
            </x-card.header>
        </div>
    </div>
@endsection
