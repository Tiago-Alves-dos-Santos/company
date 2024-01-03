{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<div class="flex flex-col">

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nome</th>
                            <th scope="col" class="px-6 py-4">Cargo</th>
                            <th scope="col" class="px-6 py-4">Foto</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $value)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->work }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $value->profile_picture }}" class="w-[50px] rounded-lg" alt="">
                                </td>
                                <td class="flex">
                                    <x-custom.button context="warning" icon="ri-edit-line text-lg mr-2" class="mr-2"
                                        :link="route('team_member.viewUpdate', ['member' => $value->id])">
                                        Editar
                                    </x-custom.button>
                                    <x-custom.button type="button" context="danger" :load_livewire="true"
                                        icon="ri-delete-bin-line text-lg mr-2" wire:loading.attr="disabled"
                                        x-on:confirm="{
                                            title: 'Deseja continuar com a ação?',
                                            description: 'A ação não poderá ser revertida',
                                            icon: 'question',
                                            accept: {
                                                label: 'Confirmar',
                                                method: 'delete',
                                                params: '{{ $value->id }}',
                                            },
                                            reject: {
                                                label: 'Cancelar',
                                            }
                                        }">
                                        Excluir
                                        <x-slot:load>
                                            <div wire:loading wire:target='x'>
                                                <x-custom.load></x-custom.load>
                                            </div>
                                        </x-slot>
                                    </x-custom.button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">N/A</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
