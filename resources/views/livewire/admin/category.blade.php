<div x-data="admin_category">
    {{-- Success is as dangerous as failure. --}}
    <div>
        <x-input label="Categoria" placeholder="website" wire:model='title' />
    </div>
    <div class="flex justify-center mt-1">
        @if (empty($editing_id))
            <x-custom.button type="button" class="mr-2" wire:click='create' wire:loading.attr="disabled" context="primary"
                :load_livewire="true" icon="ri-add-line text-lg mr-2">
                Cadastrar
                <x-slot:load>
                    <div wire:loading wire:target='create'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
            <x-custom.button type="button" context="info" :load_livewire="true" icon="ri-search-line text-lg mr-2" wire:click='$refresh'>
                Buscar
                <x-slot:load>
                    <div wire:loading wire:target='$refresh'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        @else
            <x-custom.button type="button" context="success" class="mr-2" :load_livewire="true"
                icon="ri-save-line text-lg mr-2" wire:click='edit' wire:loading.attr="disabled">
                Salvar
                <x-slot:load>
                    <div wire:loading wire:target='edit'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
            <x-custom.button type="button" context="danger" wire:click='cancel'  wire:loading.attr="disabled" :load_livewire="true" icon="ri-close-line text-lg mr-2">
                Cancelar
                <x-slot:load>
                    <div wire:loading wire:target='cancel'>
                        <x-custom.load></x-custom.load>
                    </div>
                </x-slot>
            </x-custom.button>
        @endif

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
                            @forelse ($categories as $value)
                                <tr>
                                    <td>
                                        {{ $value->title }}
                                    </td>
                                    <td class="flex flex-wrap justify-center">
                                        <x-custom.button type="button" wire:click='loadEdit({{ $value->id }})'
                                            :context="$value->id == $editing_id ? 'info' : 'warning'" :load_livewire="true" icon="ri-edit-line text-lg mr-2"
                                            class="mr-2" :disabled="$value->id == $editing_id"  wire:loading.attr="disabled">
                                            Editar
                                            <x-slot:load>
                                                <div wire:loading wire:target='loadEdit({{ $value->id }})'>
                                                    <x-custom.load></x-custom.load>
                                                </div>
                                            </x-slot>
                                        </x-custom.button>
                                        <x-custom.button type="button" context="danger" :load_livewire="true"
                                            icon="ri-delete-bin-line text-lg mr-2" wire:loading.attr="disabled"
                                            x-on:confirm="{
                                                title: 'Deseja continuar com a ação?',
                                                description: 'Ação não poderá ser desfeita.',
                                                icon: 'question',
                                                accept: {
                                                    label: 'Confirmar',
                                                    method: 'delete',
                                                    params: {{ $value->id }}
                                                },
                                                reject: {
                                                    label: 'Cancelar',
                                                }
                                            }">
                                            Excluir
                                            <x-slot:load>
                                                <div wire:loading wire:target='delete({{ $value->id }})'>
                                                    <x-custom.load></x-custom.load>
                                                </div>
                                            </x-slot>
                                        </x-custom.button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

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
            Alpine.data('admin_category', () => ({}))
        })
    </script>
@endpush
