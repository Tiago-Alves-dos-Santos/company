<div x-data="form_tag">
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit='save'>
        <x-input label="Tag" corner-hint="Ex: Feedbacks" wire:model='title' />
        <x-input label="Apelido(opcional)" corner-hint="Ex: Comentarios" wire:model='surname' />
        @if ($operation == 'update')
        <div class="w-full p-4 mt-2 border border-gray-300 rounded-md">
            <x-toggle label="{{ $visible ? 'Ativo':'Inativo' }}" lg wire:model.lazy="visible" />
        </div>
        @endif
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
</div>
@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('form_tag', () => ({}))
        })
    </script>
@endpush
