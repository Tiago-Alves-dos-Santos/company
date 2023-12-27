{{-- The best athlete wants his opponent at his best. --}}
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nome</th>
                            <th scope="col" class="px-6 py-4">Trabalho</th>
                            <th scope="col" class="px-6 py-4">Avaliação</th>
                            <th scope="col" class="px-6 py-4">Ativo</th>
                            <th scope="col" class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feedbacks as $value)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $value->client->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->client->work }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->rating }}/5</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($value->visible)
                                        <span
                                            class="inline-block whitespace-nowrap rounded-full bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                            ATIVO
                                        </span>
                                    @else
                                        <span
                                            class="inline-block whitespace-nowrap rounded-full bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                            INATIVO
                                        </span>
                                    @endif
                                </td>
                                <td class="flex justify-end px-6 py-4">
                                    <x-custom.dropdown.button title="Ações" context='primary'>
                                        <x-custom.dropdown.link title="Ativar"></x-custom.dropdown.link>
                                        <x-custom.dropdown.link title="Excluir"></x-custom.dropdown.link>
                                    </x-custom.dropdown.button>
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
