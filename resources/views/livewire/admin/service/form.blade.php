<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit='create'>
        <x-input label="Nome" placeholder="Nome do serviço" wire:model='title'/>
        <x-input label="Icon(remixon)" placeholder="ri-save-line" wire:model='icon'/>
        <x-textarea wire:model="description" label="Descrição" placeholder="Descrição do serviço" />
        <div class="flex justify-end mt-2">
            <x-custom.button type="submit" :load_livewire='true' icon='ri-save-line text-lg mr-3 p-0'>
                SALVAR
                <x-slot:load>
                    <div wire:loading wire:target='create'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        </div>
    </form>
</div>
