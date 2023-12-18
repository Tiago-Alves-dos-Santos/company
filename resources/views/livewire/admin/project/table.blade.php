<div class="flex flex-col">
    {{-- Stop trying to control. --}}
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">Categoria</th>
                            <th scope="col" class="px-6 py-4">Projeto</th>
                            <th scope="col" class="px-6 py-4">Empresa</th>
                            <th scope="col" class="px-6 py-4">Imagens</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $value)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $value->projectCategory->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->title }}</td>
                                <td class="px-6 py-4">{{ $value->company_name }}</td>
                                <td class="px-6 py-4">{{ $value->projects_image_count }}</td>
                                <td class="flex px-6 py-4 whitespace-nowrap">
                                    <x-custom.button context="warning" icon="ri-edit-line text-lg mr-2" class="mr-2"
                                        :link="route('project.viewUpdate', ['project' => $value->id])">
                                        Editar
                                    </x-custom.button>
                                    <x-custom.button type="button" context="danger" :load_livewire="true"
                                        icon="ri-delete-bin-line text-lg mr-2" wire:loading.attr="disabled"
                                        x-on:confirm="{
                            title: 'Deseja continuar com a ação?',
                            description: 'Isso pode deletar outros projetos relacionados a categoria',
                            icon: 'question',
                            accept: {
                                label: 'Confirmar',
                                method: 'delete',
                                params: ''
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
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
