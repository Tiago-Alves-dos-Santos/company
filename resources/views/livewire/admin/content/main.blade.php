<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist" data-te-nav-ref>
        @foreach ($contents as $value)
            <li role="presentation">
                <a href="#tabs-{{ $value->id }}"
                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    data-te-toggle="pill" data-te-target="#tabs-{{ $value->id }}" role="tab"
                    aria-controls="tabs-home" aria-selected="true">{{ $value->tag->title }}</a>
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
    </div>
</div>
