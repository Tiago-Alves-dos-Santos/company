@extends('layout.admin', ['tab_title' => 'Empresa'])



@section('content')
    <x-custom.modal title="Cadastro Tag" id="create-tag">
        <livewire:admin.tag.form>
    </x-custom.modal>
    <div class="flex flex-col items-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Tags">
                Tags
                <button type="button"
                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    data-te-toggle="modal" data-te-target="#create-tag" data-te-ripple-init data-te-ripple-color="light">
                    Launch static backdrop modal
                </button>
            </x-card.header>
        </div>
        <div class="w-full sm:w-[800px] mt-1">
            <x-card.header title="Tags">
                Conteudo
            </x-card.header>
        </div>
    </div>
@endsection
