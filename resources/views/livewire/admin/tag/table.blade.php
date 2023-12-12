<div class="flex flex-col">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Título</th>
                            <th scope="col" class="px-6 py-4">Apelido</th>
                            <th scope="col" class="px-6 py-4">Visivel</th>
                            <th scope="col" class="px-6 py-4">Açoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $value)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $value->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->surname }}</td>
                                @if ($value->visible)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <i class="text-xl text-green-400 ri-check-line"></i>
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <i class="text-xl text-red-400 ri-close-fill"></i>
                                    </td>
                                @endif
                                <td>
                                    <x-custom.button type='button' :load_livewire="true" wire:target='x' wire:loading.attr="disabled"
                                        icon="ri-pencil-fill text-lg mr-3 p-0" context='warning'>
                                        EDITAR
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
                                <td colspan="5" class="font-bold text-center text-danger">N/A</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
