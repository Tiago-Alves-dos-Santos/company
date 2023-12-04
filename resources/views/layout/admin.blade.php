<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $tab_title ?? '' }} - {{ config('app.name') }}</title>
    <!-- Favicons -->
    <link href="{{ asset('img/logo-ico.png') }}" rel="icon">
    @vite(['resources/sass/admin.scss', 'resources/js/app.js'])
    @wireUiScripts
</head>

<body class="bg-gray-300">
    @include('include.admin.sidebar')


    <div class="!pl-[260px] relative" id="content">
        <!-- Toggler -->
        <button
            class="inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg ml-2"
            data-te-sidenav-toggle-ref data-te-target="#sidenav-2" aria-controls="#sidenav-2" aria-haspopup="true">
            <span class="block text-white" id="show-sidebar" data-open="true">
                <i class="bi bi-list text-lg"></i>
            </span>
        </button>

        <!-- Toggler -->
        <div class="my-5 ml-2 mr-2 flex text-start">

            <div class="block rounded-lg bg-white shadow-xl dark:bg-neutral-700 w-full px-3 py-3">
                <h1 class="font-bold text-center text-xl">
                    @yield('title')
                </h1>
                @yield('content')
            </div>
        </div>
    </div>
    @stack('script')
    <script>
        //hidde all loads
        document.querySelectorAll('.load-button').forEach(function(button) {
            button.style.display = 'none';
        });

        const showLoadButton = (form, value = 'submit') => {
            let buttons = form.getElementsByTagName('button');
            for (var i = 0; i < buttons.length; i++) {
                let load = buttons[i].querySelector('.load-button');
                buttons[i].setAttribute('disabled', 'disabled');
                load.style.display = 'inline-block';
            }

        }
    </script>
</body>

</html>
