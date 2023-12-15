@extends('layout.admin', ['tab_title' => 'Serviços'])


@section('content')
<div class="flex justify-center w-full">
    <div class="w-full sm:w-[900px]">
        <x-card.header title="Atualizar Serviço: {{ $service->title }}">
            <livewire:admin.service.form-update :service="$service">
        </x-card.header>
    </div>
</div>
@endsection
