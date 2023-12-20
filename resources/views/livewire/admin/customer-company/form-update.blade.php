<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <form wire:submit='save' enctype="multipart/form-data">
        <div class="flex justify-center mb-2">
            <img src="{{ asset("img/customer_company/".$customer->logo) }}" class='w-[200px]' alt="">
        </div>
        <div>
            <x-input wire:model="name" label="Nome da empresa *" />
            <x-input wire:model="client_name" label="Nome do cliente *" />
            <x-input type='url' wire:model="website" label="Webiste" />
            <x-input type='file' wire:model="file" label="Logo da empresa" />
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

