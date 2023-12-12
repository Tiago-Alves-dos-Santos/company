<div x-data="form_tag">
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit='save'>
        <x-input label="Tag" corner-hint="Ex: Feedbacks" wire:model='title' />
        <x-input label="Apelido(opcional)" corner-hint="Ex: Comentarios" wire:model='surname' />
        {{ $visible }}
        <x-select label="Visibilidade" placeholder="Visbilidade" wire:model="visible">
            <x-select.option label="Visivel" value="1" />
            <x-select.option label="Não visivel" value="0" />
        </x-select>
        <x-native-select label="Select Status" wire:model="visible">
            <option value="1" @checked($visible)>Visivel</option>
            <option value='0' @checked($visible == 0)>Não visivel</option>
        </x-native-select>
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
