@extends('layout.admin', ['tab_title' => 'Serviços'])


@section('content')
<div class="flex justify-center w-full">
    <div class="w-full sm:w-[900px]">
        <x-card.header title="Serviços">
            <livewire:admin.service.table>
        </x-card.header>
    </div>
</div>
@endsection
