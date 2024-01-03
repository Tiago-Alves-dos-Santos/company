<div x-data="company">
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit='save' enctype="multipart/form-data">
        <div class="flex flex-col items-center justify-center w-full">
            <div class="flex justify-center border border-gray-400 w-[220px] h-max-[320px]">
                @if ($logo && in_array($logo->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']))
                    <img src="{{ $logo->temporaryUrl() }}" class="" alt="">
                @elseif(!empty($company->logo))
                    <img src="{{ asset("img/company/{$company->logo}") }}" class="" alt="">
                @else
                    <img src="{{ asset('img/empty-64.png') }}" class="w-[64px]" alt="">
                @endif
            </div>
            <x-custom.button
                x-on:confirm="{
                title: 'Deseja continuar com a ação?',
                description: 'Ação não poderá ser desfeita.',
                icon: 'question',
                accept: {
                    label: 'Confirmar',
                    method: 'deleteLogo'
                },
                reject: {
                    label: 'Cancelar',
                }
            }"
                type="button" context="danger" :load_livewire="true" icon="ri-delete-bin-line text-lg mr-2">
                Remover
                <x-slot:load>
                    <div wire:loading wire:target='deleteLogo'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>


        </div>
        <div>
            <div class="mx-1 mb-3">
                <label for="formFile" class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">
                    Foto do perfil
                </label>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file" id="formFile" wire:model='logo' accept="image/png, image/jpeg, image/jpg" />
            </div>
        </div>
        <div class="flex flex-col sm:flex-row" wire:ignore>
            <div class="relative mx-1 my-1 sm:w-1/2">
                <x-input wire:model="name" label="Nome" />
            </div>

            <div class="relative mx-1 my-1 sm:w-1/2">
                <x-input wire:model="cnpj" label="CNPJ" x-mask='99.999.999/9999-99' />
            </div>
        </div>

        <div class="flex justify-end">
            <x-custom.button type='submit' :load_livewire="true" wire:loading.attr="disabled"
                icon="ri-save-line text-lg mr-3 p-0">
                Salvar
                <x-slot:load>
                    <div wire:loading wire:target='save'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        </div>
        @if ($errors->any())
            <div class="px-6 py-5 mt-3 text-base rounded-lg bg-danger-100 text-danger-700" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>

@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('company', () => ({
            }))
        })
    </script>
@endpush
