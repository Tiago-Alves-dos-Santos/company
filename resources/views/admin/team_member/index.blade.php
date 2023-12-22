@extends('layout.admin', ['tab_title' => 'Time'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Equipe">
                <div class="flex justify-end">
                    <x-custom.button :link="route('team_member.viewCreate')">
                        Novo
                    </x-custom.button>
                </div>
                <livewire:admin.team-member.table>
            </x-card.header>
        </div>
    </div>
@endsection
