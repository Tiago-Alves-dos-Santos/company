<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div>
        <form wire:submit='save' enctype="multipart/form-data">
            <div class="flex justify-center w-full">
                <div class="flex justify-center border border-gray-400 w-[220px] h-max-[320px]">
                    @if ($file && in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']))
                        <img src="{{ $file->temporaryUrl() }}" class="" alt="">
                    @elseif(!empty($member->profile_picture))
                        <img src="{{ asset("img/members/{$member->profile_picture}") }}" class="" alt="">
                    @else
                        <img src="{{ asset('img/empty-64.png') }}" class="w-[64px]" alt="">
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Nome *" wire:model='name' />
                <x-input label="Cargo *" placeholder="Empreendedor - Tecnologia" wire:model='work' />
                <x-input label="Facebook link *" type='url' wire:model='link_facebook' />
                <x-input label="Instagram link *" type='url' wire:model='link_instagram' />
                <x-textarea wire:model="description" label="Descrição *"
                    placeholder="Descreva sobre a pessoa e o cargo" />
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
