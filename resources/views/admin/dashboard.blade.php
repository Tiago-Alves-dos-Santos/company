@extends('layout.admin', ['tab_title' => 'Dashboard'])

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-wrap space-x-1 space-y-1">
        <x-card.number title="Contato(Não lidos)" class="w-[300px] text-red-400">
            {{ $count->conatct_unread }}
        </x-card.number>
        <x-card.number title="Depoimentos" class="w-[300px] text-orange-400">
            {{ $feedback->invisible }}
        </x-card.number>
        <x-card.number title="Projetos" class="w-[300px]">
            {{ $count->projects }}
        </x-card.number>
        <x-card.number title="Clientes(empresa)" class="w-[300px]">
            {{ $count->clients_company }}
        </x-card.number>
        <x-card.number title="Clientes(gmail)" class="w-[300px]">
            {{ $count->clients }}
        </x-card.number>
    </div>
    <div class="flex flex-wrap mt-2 mb-2 space-x-1 space-y-1 ">
        @php
            $color_avg = '';
            if($feedback->avg < 3){
                $color_avg = 'text-red-400';
            }else if($feedback->avg >= 3 && $feedback->avg < 4){
                $color_avg = 'text-yellow-400';
            }else if($feedback->avg >= 4){
                $color_avg = 'text-green-400';
            }

        @endphp
        <x-card.number title="Avaliação - Média" class="w-full {{ $color_avg }}">
            {{ $feedback->avg }}
        </x-card.number>
    </div>
    <div class="w-full h-[400px]">
        <livewire:livewire-column-chart
            key="{{ $columnFeedbackChart->reactiveKey() }}"
            :column-chart-model="$columnFeedbackChart"
        />
    </div>
@endsection
