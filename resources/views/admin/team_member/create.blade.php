@extends('layout.admin', ['tab_title' => 'Equipe'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Cadastrar Membro">
                <livewire:admin.team-member.form>
            </x-card.header>
        </div>
    </div>
@endsection
