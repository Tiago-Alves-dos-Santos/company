<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit='save' enctype="multipart/form-data">
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
        <div class="flex justify-end mt-1">
            <x-custom.button type="submit" context="primary" :load_livewire="true" icon="ri-save-line text-lg mr-2"
                class="mr-2" wire:loading.attr="disabled">
                Salvar
                <x-slot:load>
                    <div wire:loading wire:target='save'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        </div>
    </form>
</div>
