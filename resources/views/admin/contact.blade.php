@extends('layout.admin', ['tab_title' => 'Empresa'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Mensagens" slot_class='p-8'>
                <livewire:admin.contact.table>
            </x-card.header>
        </div>
    </div>
@endsection
