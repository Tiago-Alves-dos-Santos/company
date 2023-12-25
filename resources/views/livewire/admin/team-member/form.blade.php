<div>
    {{-- Stop trying to control. --}}
    <div>
        <form wire:submit='create' enctype="multipart/form-data">
            <div>
                <x-input label="Nome *" wire:model='name' />
                <x-input label="Cargo *" placeholder="Empreendedor - Tecnologia" wire:model='work' />
                <x-input label="Facebook link *" type='url' wire:model='link_facebook' />
                <x-input label="Instagram link *" type='url' wire:model='link_instagram' />
                <x-textarea wire:model="description" label="Descrição *" placeholder="Descreva sobre a pessoa e o cargo" />
                <x-input label="Perfil *" wire:model='file' type='file' />
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
</div>
