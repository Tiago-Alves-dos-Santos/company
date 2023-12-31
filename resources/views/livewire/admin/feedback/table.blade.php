{{-- The best athlete wants his opponent at his best. --}}
<div class="flex flex-col" x-data='table' x-on:admin_feedback_table_showFeedback="showFeedbacks($event)">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left">
                    <thead class="font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
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
                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                    <img src="{{ $value->client->profile_photo_link }}" class="w-[50px] rounded-full"
                                        alt="">
                                </td>
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $value->client->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->client->work }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $value->rating }}/5</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if (!empty($value->deleted_at))
                                        <span
                                            class="inline-block whitespace-nowrap rounded-full bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                            DELETADO
                                        </span>
                                    @elseif($value->visible)
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
                                        <x-custom.dropdown.link title="Depoimento"
                                            wire:click='showFeedback({{ $value->id }})'></x-custom.dropdown.link>
                                        @if (empty($value->deleted_at))
                                            <x-custom.dropdown.link
                                                title="{{ $value->visible ? 'Inativar' : 'Ativar' }}"
                                                wire:click='toggleVisible({{ $value->id }})'></x-custom.dropdown.link>
                                            <x-custom.dropdown.link title="Excluir"
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
                                            }"></x-custom.dropdown.link>
                                        @endif
                                    </x-custom.dropdown.button>

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="p-2 mt-2 border-2 border-black" x-show='show_feedback' x-text='feedback'></div>
                <div class="mt-2">
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('table', () => ({
                show_feedback: false,
                feedback: '',
                showFeedbacks(feedback) {

                    this.show_feedback = true;
                    this.feedback = event.detail.feedback
                },
                //function init
                init() {
                    Livewire.on('admin_feedback_table_showFeedback', ({
                        feedback
                    }) => {
                        this.showFeedbacks(feedback);
                    });
                },
            }))
        })
    </script>
@endpush
