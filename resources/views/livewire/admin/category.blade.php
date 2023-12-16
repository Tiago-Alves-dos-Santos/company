<div x-data="admin_category">
    {{-- Success is as dangerous as failure. --}}
    <div>
        <x-input label="Categoria" placeholder="website" wire:model='title'/>
    </div>
    <div class="flex justify-center mt-1">
        <x-custom.button type="button" class="mr-2" wire:click='create' wire:loading.attr="disabled" context="primary" :load_livewire="true" icon="ri-add-line text-lg mr-2">
                Cadastrar
                <x-slot:load>
                    <div wire:loading wire:target='create'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        <x-custom.button type="button" context="info" :load_livewire="true" icon="ri-search-line text-lg mr-2">
                Buscar
                <x-slot:load>
                    <div wire:loading wire:target='x'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full mb-4 text-sm font-light text-left">
                        <thead class="font-medium border-b dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">CATEGORIA</th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('admin_category', () => ({
            }))
        })
    </script>
@endpush
