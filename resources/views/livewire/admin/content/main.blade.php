<div x-data="contentMain">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist" data-te-nav-ref>
        @foreach ($contents as $value)
            <li role="presentation">
                <a href="#tabs-{{ $value->id }}"
                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    data-te-toggle="pill" data-te-target="#tabs-{{ $value->id }}" role="tab"
                    aria-controls="tabs-home" aria-selected="true"
                    @click='toggleInsert({{ $value->id }}, {{ $value->content}})'>{{ $value->tag->title }}</a>
            </li>
        @endforeach
        {{-- data-te-nav-active --}}
    </ul>

    <!--Tabs content-->
    <div class="mb-6">
        @foreach ($contents as $value)
            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                id="tabs-{{ $value->id }}" role="tabpanel" aria-labelledby="tabs-{{ $value->id }}-tab">
                {{ $value->tag->surname }}
            </div>
        @endforeach
        <div>
            <div id="jsoneditor" style="width: 100%; height: 400px;" wire:ignore></div>
            <div class="flex justify-end mt-2">
                <form action="{{ route('content.saveJson') }}" method="POST" id="form-saveJson">
                    @csrf
                    <x-custom.button type='submit' icon="ri-save-line text-lg mr-3 p-0" context='success'>
                        Salvar
                    </x-custom.button>
                    <input type="hidden" name="content" value="" id="json_value">
                    <input type="hidden" name="id" value="" id="content_id">
                </form>


            </div>
        </div>


    </div>
</div>


@push('script')
    <script>
        let editor = null;
        document.addEventListener('alpine:init', () => {
            Alpine.data('contentMain', () => ({
                toggleInsert(id =0 , content = JSON.stringify("{json:'vazio'}")) {
                    editor.set(JSON.parse(content));
                    document.getElementById('json_value').value = JSON.stringify(editor.get());
                    document.getElementById('content_id').value = id;
                },
            }));
        })


        function loadEditor() {
            // create the editor
            const container = document.getElementById("jsoneditor")
            const options = {
                onChange: function(e) {
                }
            }
            editor = new JSONEditor(container, options)

        }
        loadEditor();

        //submit form
        document.getElementById('form-saveJson').addEventListener('submit', (event) => {
            event.preventDefault();
            document.getElementById('json_value').value = JSON.stringify(editor.get());
            showLoadButton(event.target);
            event.target.submit();

        });
    </script>
@endpush
