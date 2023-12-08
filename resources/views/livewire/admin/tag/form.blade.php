<div x-data>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit='save'>
        <x-input label="Tag" corner-hint="Ex: Feedbacks" wire:model='title' />
        <x-input label="Apelido(opcional)" corner-hint="Ex: Comentarios" wire:model='surname' />
        <div class="flex justify-end mt-1">
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
    </form>
    @if ($errors->any())
        <div class="px-6 py-5 mt-3 text-base rounded-lg bg-danger-100 text-danger-700" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
