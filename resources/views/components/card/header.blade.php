@props([
    'title' => '',
    'slot_class' => ''
])
<div
    class="block border rounded-lg w-full bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]
            dark:bg-neutral-700 ">
    <!-- He who is contented is rich. - Laozi -->
    <h5
        class="px-6 py-3 text-xl font-medium leading-tight border-b-2 border-neutral-100 dark:border-neutral-600 dark:text-neutral-50">
        {{ $title }}
    </h5>
    <div class="{{ empty($slot_class) ? 'p-6' : $slot_class }}">
        {{ $slot }}


    </div>
</div>
