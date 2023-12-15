<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
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
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 whitespace-nowrap">Mark</td>
                                <td class="px-6 py-4 whitespace-nowrap">Otto</td>
                                <td class="px-6 py-4 whitespace-nowrap">@mdo</td>
                                <td class="flex justify-start px-6 py-4 whitespace-nowrap">
                                    <x-custom.dropdown.button title="Ações">
                                        <x-custom.dropdown.link title="Editar"></x-custom.dropdown.link>
                                        <x-custom.dropdown.link title="Excluir"></x-custom.dropdown.link>
                                    </x-custom.dropdown.button>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>