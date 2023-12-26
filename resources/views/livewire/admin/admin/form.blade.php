<div>
    {{-- The whole world belongs to you. --}}
    <form wire:submit='create'>
        <div>
            <x-input wire:model="name" label="Nome *" />
            <x-input wire:model="email" label="Email *" />
            <x-input wire:model="password" type='password' label="Senha *" />
            <x-input wire:model="password_confirmation" type='password' label="Confirmar *" />
        </div>
        <div class="mt-2 cursor-pointer">
            <x-checkbox id="right-label" label="Total acesso(first)" wire:model.lazy="level" class="cursor-pointer" />
        </div>
        <div class="flex justify-end mt-2">
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
