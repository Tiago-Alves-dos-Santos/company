@extends('layout.admin', ['tab_title' => 'Email'])

@section('content')
    <div class="flex flex-col items-center justify-center mt-2 ">

        <div class="w-full sm:w-[800px]">
            <x-card.header title="Confirmar email">
                <div class="px-6 py-5 mb-4 text-base rounded-lg bg-warning-100 text-warning-800" role="alert">
                    Confirme seu email, para reenviar clique abaixo
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <div class="flex mt-2">
                            <x-custom.button type="submit" data-te-ripple-init data-te-ripple-color="light" context='success'
                                icon="ri-mail-send-line text-lg mr-3 p-0">
                                Enviar
                            </x-custom.button>
                        </div>
                    </form>
                </div>
            </x-card.header>
        </div>
    @endsection
