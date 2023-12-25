@extends('layout.admin', ['tab_title' => 'Equipe'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Equipe Editar">
                <livewire:admin.team-member.form-update :member="$member">
            </x-card.header>
        </div>
    </div>
@endsection
