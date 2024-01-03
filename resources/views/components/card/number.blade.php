<div {{ $attributes->class(['px-6 py-8 rounded-lg shadow-md border flex flex-col items-center justify-center']) }}>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <h1 class="text-6xl font-bold">{{ $slot }}</h1>
    <h2 class="font-bold">{{ $title }}</h2>
</div>
