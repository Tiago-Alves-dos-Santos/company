@extends('layout.admin', ['tab_title' => 'Projetos'])

@section('content')
    <div class="flex justify-center w-full">
        <div class="w-full sm:w-[800px]">
            <x-card.header title="Atualizar Projeto: {{ $project->title }}">
                <!--Tabs navigation-->
                <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist" data-te-nav-ref>
                    <li role="presentation" class="flex-auto text-center">
                        <a href="#tabs-home01"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill" data-te-target="#tabs-home01" data-te-nav-active role="tab"
                            aria-controls="tabs-home01" aria-selected="true">Projeto</a>
                    </li>
                    <li role="presentation" class="flex-auto text-center">
                        <a href="#tabs-profile01"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                            data-te-toggle="pill" data-te-target="#tabs-profile01" role="tab"
                            aria-controls="tabs-profile01" aria-selected="false">Imagens</a>
                    </li>

                </ul>

                <!--Tabs content-->
                <div class="mb-6">
                    <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                        id="tabs-home01" role="tabpanel" aria-labelledby="tabs-home-tab01" data-te-tab-active>
                        Tab 1 content
                    </div>
                    <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                        id="tabs-profile01" role="tabpanel" aria-labelledby="tabs-profile-tab01">
                        Tab 2 content
                    </div>
                </div>
            </x-card.header>
        </div>
    </div>
@endsection
