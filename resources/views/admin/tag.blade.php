@extends('layout.admin', ['tab_title' => 'Empresa'])



@section('content')
    <x-custom.modal title="Cadastro Tag" id="create-tag">
        <livewire:admin.tag.form>
    </x-custom.modal>
    <div class="flex flex-col items-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Tags">
                <div class="flex justify-end">
                    <button type="button"
                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal" data-te-target="#create-tag" data-te-ripple-init data-te-ripple-color="light">
                        Nova
                    </button>
                </div>
                <div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-sm font-light text-left">
                                        <thead class="font-medium border-b dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">#</th>
                                                <th scope="col" class="px-6 py-4">First</th>
                                                <th scope="col" class="px-6 py-4">Last</th>
                                                <th scope="col" class="px-6 py-4">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="px-6 py-4 font-medium whitespace-nowrap">1</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Mark</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Otto</td>
                                                <td class="px-6 py-4 whitespace-nowrap">@mdo</td>
                                            </tr>
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="px-6 py-4 font-medium whitespace-nowrap">2</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Jacob</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Thornton</td>
                                                <td class="px-6 py-4 whitespace-nowrap">@fat</td>
                                            </tr>
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="px-6 py-4 font-medium whitespace-nowrap">3</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Larry</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Wild</td>
                                                <td class="px-6 py-4 whitespace-nowrap">@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card.header>
        </div>
        <div class="w-full sm:w-[800px] mt-1">
            <x-card.header title="Tags">
                Conteudo
            </x-card.header>
        </div>
    </div>
@endsection
