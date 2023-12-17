<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit='create'>
        <div>
            <x-input label="Título *" placeholder="Site fulano" />
            <x-textarea wire:model="comment" label="Descrição *" placeholder="Descrição do projeto" />
        </div>
        <div class="flex flex-wrap sm:flex-nowrap">
            <div class="w-full sm:w-[50%] sm:mr-1">
                <x-input label="Empresa *" />
            </div>
            <div class="w-full sm:w-[50%] ">
                <x-input label="Cliente" />
            </div>
        </div>
        <div>
            <x-input type="url" label="Website" placeholder="https://endereco.site.com.br" />
        </div>
        <div class="flex justify-end mt-1">
            <x-custom.button type="submit"
                context="primary" :load_livewire="true" icon="ri-save-line text-lg mr-2"
                class="mr-2"  wire:loading.attr="disabled">
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
