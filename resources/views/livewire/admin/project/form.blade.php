<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit='create' enctype="multipart/form-data">
        <div>
            <x-native-select label="Categoria" placeholder="Selecione" :options="$categories" option-label="title"
                option-value="id" wire:model="category_id" :searchable='true'/>
        </div>
        <div>
            <x-input label="Título *" placeholder="Site fulano" wire:model='title' />
            <x-textarea label="Descrição *" placeholder="Descrição do projeto" wire:model='description' />
        </div>
        <div class="flex flex-wrap sm:flex-nowrap">
            <div class="w-full sm:w-[50%] sm:mr-1">
                <x-input label="Empresa *" wire:model='company_name' />
            </div>
            <div class="w-full sm:w-[50%] ">
                <x-input label="Cliente" wire:model='client_name' />
            </div>
        </div>
        <div>
            <x-input type="url" label="Website" placeholder="https://endereco.site.com.br" wire:model='website' />
        </div>
        <div>
            <div class="mb-3">
                <label for="formFile" class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Fotos do
                    projeto</label>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file" id="formFile" multiple accept="image/png, image/jpeg, image/jpg" wire:model='file'/>
            </div>
        </div>
        <div class="flex justify-end mt-1">
            <x-custom.button type="submit" context="primary" :load_livewire="true" icon="ri-save-line text-lg mr-2"
                class="mr-2" wire:loading.attr="disabled">
                Salvar
                <x-slot:load>
                    <div wire:loading wire:target='create'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        </div>
    </form>
</div>
