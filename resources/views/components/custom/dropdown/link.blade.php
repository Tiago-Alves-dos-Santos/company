@props([
    'title' => 'title',
    'link' => '#'
])
<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <li>
        <a
          class="block w-full px-4 py-2 text-sm font-normal bg-transparent whitespace-nowrap text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
          href="{{ $link }}"
          data-te-dropdown-item-ref
          >{{ $title }}</a
        >
      </li>
</div>
