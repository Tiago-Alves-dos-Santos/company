@extends('layout.admin', ['tab_title' => 'Dashboard'])

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-wrap space-x-1 space-y-1">
        <x-card.number title="Contato(Não lidos)" class="w-[300px] text-red-400">
            {{ $count->conatct_unread }}
        </x-card.number>
        <x-card.number title="Projetos" class="w-[300px]">
            {{ $count->projects }}
        </x-card.number>
        <x-card.number title="Clientes(empresa)" class="w-[300px]">
            {{ $count->clients_company }}
        </x-card.number>
        <x-card.number title="Clientes(facebook)" class="w-[300px]">
            {{ $count->clients }}
        </x-card.number>
    </div>
    <div class="">
        <x-card.header title="Avaliação">

        </x-card.header>
    </div>
@endsection
