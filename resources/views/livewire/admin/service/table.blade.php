<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full mb-4 text-sm font-light text-left">
                        <thead class="font-medium border-b dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">TÍTULO</th>
                                <th scope="col" class="px-6 py-4">DESCRIÇÃO</th>
                                <th scope="col" class="px-6 py-4">TAG</th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $value)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->title }}</td>
                                    <td class="px-6 py-4">{{ $value->description }}</td>
                                    <td class="flex justify-start px-6 py-4 whitespace-nowrap">
                                        <x-custom.dropdown.button title="Ações">
                                            <x-custom.dropdown.link title="Editar"
                                                :link="route('services.viewUpdate', ['service' => $value->id])"></x-custom.dropdown.link>
                                            <x-custom.dropdown.link title="Excluir"
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
                                            }"></x-custom.dropdown.link>
                                        </x-custom.dropdown.button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger"> N/A </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
