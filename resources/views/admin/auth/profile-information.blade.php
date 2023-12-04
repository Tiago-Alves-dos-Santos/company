@extends('layout.admin', ['tab_title' => 'Perfil'])

@section('title', 'Dados de perfil')


@section('content')
    <div class="mt-2 flex justify-center">
        <div
            class="block border rounded-lg min-w-[300px] w-[800px] bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]
            dark:bg-neutral-700 ">
            <h5
                class="border-b-2 border-neutral-100 px-6 py-3 text-xl font-medium leading-tight dark:border-neutral-600 dark:text-neutral-50">
                Meus dados
            </h5>
            <div class="p-6">
                <form action="{{ route('user-profile-information.update') }}" onsubmit="showLoadButton(this)" method="POST">
                    @csrf
                    @method('put')
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1" placeholder="Nome" name="name" value="{{ Auth::user()->name }}"/>
                        <label for="exampleFormControlInput1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Nome
                        </label>
                    </div>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="email"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1" placeholder="Email" name="email" value="{{ Auth::user()->email }}"/>
                        <label for="exampleFormControlInput1"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Email
                        </label>
                    </div>
                    <div class="w-full flex justify-end">
                        <x-custom.button type="submit" data-te-ripple-init data-te-ripple-color="light" context='primary'
                            icon="ri-save-line text-lg mr-3 p-0">
                            Salvar
                        </x-custom.button>
                    </div>
                    @if ($errors->hasBag('updateProfileInformation'))
                        <div class="mt-3 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">
                            <ul>
                                @foreach ($errors->updateProfileInformation->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>


            </div>
        </div>
    </div>
@endsection

