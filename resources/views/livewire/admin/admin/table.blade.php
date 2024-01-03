 {{-- Do your work, then step back. --}}
 <div class="flex flex-col">
     <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
             <div class="overflow-hidden">
                 <table class="min-w-full text-sm font-light text-left">
                     <thead class="font-medium border-b dark:border-neutral-500">
                         <tr>
                             <th scope="col" class="px-6 py-4">Nome</th>
                             <th scope="col" class="px-6 py-4">Email</th>
                             <th scope="col" class="px-6 py-4">Acesso</th>
                             <th scope="col" class="px-6 py-4">Ações</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($admins as $value)
                             <tr class="border-b dark:border-neutral-500">
                                 <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $value->name }}</td>
                                 <td class="px-6 py-4 whitespace-nowrap">{{ $value->email }}</td>
                                 @if ($value->level_access == 'first')
                                     <td class="px-6 py-4 whitespace-nowrap">
                                         <span
                                             class="inline-block whitespace-nowrap rounded-full bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                             1
                                         </span>
                                     </td>
                                 @else
                                     <td class="px-6 py-4 whitespace-nowrap">
                                         <span
                                             class="inline-block whitespace-nowrap rounded-full bg-info-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-800">
                                             2
                                         </span>
                                     </td>
                                 @endif
                                 <td class="flex px-6 py-4 whitespace-nowrap">
                                     <x-custom.button type="button" context="danger" :load_livewire="true"
                                         icon="ri-delete-bin-line text-lg mr-2" wire:loading.attr="disabled"
                                         x-on:confirm="{
                                           title: 'Deseja continuar com a ação?',
                                           description: 'A ação não poderá ser desfeita.',
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
                                 <td colspan="4" class="font-bold text-center">N/A</td>
                             </tr>
                         @endforelse

                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
