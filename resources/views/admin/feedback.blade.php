@extends('layout.admin', ['tab_title' => 'Depoimentos'])

@section('content')
    <div class="flex justify-center w-full" x-data='feedback' x-on:view_admin_feedback.window="setTitleFilter($event)">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Depoimentos">
                <div class="flex justify-end">
                    <x-custom.dropdown.button title="Filtro" context='info' icon='ri-filter-line'>
                        <x-custom.dropdown.link title="Ativos" @click="$dispatch('livewire.admin.feedback.setSearch', {search: 'active'})"></x-custom.dropdown.link>
                        <x-custom.dropdown.link title="Inativos" @click="$dispatch('livewire.admin.feedback.setSearch', {search: 'inactive'})"></></x-custom.dropdown.link>
                        <x-custom.dropdown.link title="Deletados" @click="$dispatch('livewire.admin.feedback.setSearch', {search: 'excluded'})"></x-custom.dropdown.link>
                    </x-custom.dropdown.button>
                </div>
                <div>
                    <h4 class="text-xl">
                        Filtro: <span x-text="filter_selected"></span>
                    </h4>
                </div>
                <div>
                    <livewire:admin.feedback.table>
                </div>
            </x-card.header>
        </div>

    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('feedback', () => ({
                filter_selected: 'Inativos',
                setTitleFilter(event) {
                    this.filter_selected = event.detail.title;
                }
            }))
        })
    </script>
@endpush
