<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    {{ $project->title }} <span class="font-bold text-blue-500">-</span> {{ $project->projectCategory->title }}
    <div class="p-2 mb-2 border border-indigo-300 rounded-md">
        <form action="">
            <div class="mb-3">
                <label for="formFile" class="inline-block mb-2 text-neutral-700 dark:text-neutral-200">Adcionar fotos</label>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file" id="formFile" multiple accept="image/png, image/jpeg, image/jpg" wire:model='file' />
            </div>
        </form>
    </div>
    <div data-te-lightbox-init class="flex flex-row flex-wrap justify-start space-x-1 space-y-1">
        @forelse ($images as $value)
            <div class="relative p-1 border-2 border-black rounded-lg delete-image-project">
                <img src="{{ asset($value->image) }}" data-te-img="{{ asset($value->image) }}"
                    alt="{{ $value->image }}"
                    data-te-caption="{{ $value->title }}"
                    class="w-[200px] h-[200px] cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
                <div class="absolute bottom-0 right-0 px-3 py-2 bg-red-500 rounded-lg cursor-pointer z-[100] icon-delete">
                    <i class="text-white ri-delete-bin-line"></i>
                </div>
            </div>
        @empty
            <h1 class="text-xl text-indigo-400">Nenhuma imagem encontrada</h1>
        @endforelse
    </div>
</div>
