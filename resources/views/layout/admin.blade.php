<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Software</title>
    <!-- Favicons -->
    <link href="{{ asset('img/logo-ico.png') }}" rel="icon">
    @vite(['resources/sass/admin.scss', 'resources/js/app.js'])
    @wireUiScripts
</head>

<body>
    @include('include.admin.sidebar')


    <div class="!pl-[260px] relative" id="content">
        <!-- Toggler -->
        <button
            class="inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg ml-2"
            data-te-sidenav-toggle-ref data-te-target="#sidenav-2" aria-controls="#sidenav-2" aria-haspopup="true" onclick="changeIcon()">
            <span class="block text-white" id="show-sidebar" data-open="true">
                <i class="ri-arrow-left-line"></i>
            </span>
        </button>

        <!-- Toggler -->
        <div class="my-5 ml-2 flex text-start">
            @yield('content')
        </div>
    </div>
    <script>
        function changeIcon(){
            if(document.getElementById('show-sidebar').getAttribute('data-open') == 'true'){
                document.getElementById('show-sidebar').setAttribute('data-open', 'false');
                document.getElementById('show-sidebar').innerHTML = '<i class="ri-arrow-right-line"></i>';
            }else{
                document.getElementById('show-sidebar').setAttribute('data-open', 'true');
                document.getElementById('show-sidebar').innerHTML = '<i class="ri-arrow-left-line"></i>';
            }
        }
    </script>
    @stack('script')
</body>

</html>
