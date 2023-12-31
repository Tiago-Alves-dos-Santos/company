{{-- The Master doesn't talk, he acts. --}}
<div>
    <div>
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <x-toggle label="{{ $read ? 'Lidos' : 'Não lidos' }}" wire:model.lazy="read" />
    </div>
    <div class="">
        @forelse ($contacts as $value)
            <div class="w-full px-3 py-2 bg-gray-200 border border-gray-400 rounded-sm shadow-sm">
                {{ $value->name }}
                <div class="p-3 mx-3 my-2 bg-white rounded-sm shadow-md">
                    <ul>
                        <li>
                            <span class="font-bold">Enviado:</span>
                            <span class="italic">{{ date('d/m/Y H:i:s', strtotime($value->created_at)) }}</span>
                        </li>
                        <li>
                            <span class="font-bold text-green-500">Lido:</span>
                            @if (strtotime($value->updated_at) > strtotime($value->created_at) )
                            <span class="italic">{{ date('d/m/Y H:i:s', strtotime($value->updated_at)) }}</span>
                            @endif
                        </li>
                        <li>
                            <span class="font-bold">E-mail:</span>
                            {{ $value->email }}
                        </li>
                        <li>
                            <span class="font-bold">Celular:</span>
                            {{ $value->cellphone }}
                        </li>
                        <li>
                            <span class="font-bold">Assunto:</span>
                            {{ $value->subject }}
                        </li>
                    </ul>
                    <span class="font-bold">Mensagem:</span>
                    <div class="p-2 bg-gray-100 border-black rounded-md">
                        {{ $value->content }}
                    </div>
                    @if (!(strtotime($value->updated_at) > strtotime($value->created_at)))
                        <div class="flex justify-end mt-3">
                            <x-custom.button type="button" context="success" :load_livewire="true" wire:click='markLikeRead({{ $value->id }})'
                                icon="ri-check-double-line text-lg mr-2" class="mr-2" wire:loading.attr="disabled">
                                Marcar como lido
                                <x-slot:load>
                                    <div wire:loading wire:target='markLikeRead'>
                                        <x-custom.load></x-custom.load>
                                    </div>
                                </x-slot>
                            </x-custom.button>
                        </div>
                    @endif
                </div>
            </div>
        @empty
        @endforelse
        <div class="mt-2">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
