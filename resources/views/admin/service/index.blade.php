@extends('layout.admin', ['tab_title' => 'Serviços'])


@section('content')
<div class="flex justify-center w-full">
    <div class="w-full sm:w-[900px]">
        <x-card.header title="Serviços">
            <div class="flex justify-end">
                <x-custom.button :link="route('services.viewCreate')" icon='ri-save-line text-lg mr-3 p-0'>
                    NOVO
                </x-custom.button>
            </div>
            <livewire:admin.service.table>
        </x-card.header>
    </div>
</div>
@endsection
