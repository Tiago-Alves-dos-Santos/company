@extends('layout.admin', ['tab_title' => 'Empresa'])



@section('content')
    <div x-data="tag">
        <x-custom.modal title="Cadastrar tag" id="create-tag">
            <livewire:admin.tag.form>
        </x-custom.modal>
        <x-custom.modal title="Editar tag" id="update-tag" close_id="update-tag-close">
            <livewire:admin.tag.form operation="update">
        </x-custom.modal>
        <div class="flex flex-col items-center w-full">
            <div class="w-full sm:w-[900px]">
                <x-card.header title="Tags">
                    <div class="flex justify-end">
                        <button type="button"
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-toggle="modal" data-te-target="#create-tag" data-te-ripple-init
                            data-te-ripple-color="light" @click="myReset">
                            Nova
                        </button>
                    </div>
                    <div>
                        <livewire:admin.tag.table>
                    </div>
                </x-card.header>
            </div>
            <div class="w-full sm:w-[900px] mt-1">
                <x-card.header title="Conteúdo">
                    <!--Tabs navigation-->
                    <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist" data-te-nav-ref>
                        @foreach ($tags as $value)
                            <li role="presentation">
                                <a href="#tabs-{{ $value->id }}"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-{{ $value->id }}"
                                    role="tab" aria-controls="tabs-{{ $value->id }}"
                                    aria-selected="true">{{ $value->title }}</a>
                            </li>
                        @endforeach

                    </ul>


                    <!--Tabs content-->
                    <div class="mb-6">
                        @foreach ($tags as $value)
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-{{ $value->id }}" role="tabpanel" aria-labelledby="tabs-{{ $value->id }}-tab"
                                >
                                {{ $value->surname }}
                                <div id="jsoneditor" style="width: 100%; height: 400px;"></div>
                            </div>
                        @endforeach
                    </div>
                </x-card.header>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('tag', () => ({
                myReset() {
                    Livewire.dispatch('tag.form.myReset');
                }
            }));
        })

        // create the editor
        const container = document.getElementById("jsoneditor")
        const options = {}
        const editor = new JSONEditor(container, options)

        // set json
        const initialJson = {
            "String": "Insira"
        }
        editor.set(initialJson)

        // get json
        const updatedJson = editor.get()
    </script>
@endpush
