<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Software</title>
    <!-- Favicons -->
    <link href="/img/logo-ico.png" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('js/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/glightbox/css/glightbox.min.css') }}">
    {{-- CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
        integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- VITE --}}
    @vite(['resources/sass/app.scss', 'resources/js/site.js'])
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        @include('include.menu')
    </header><!-- End Header -->

    @yield('before-content')
    <main id="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        @include('include.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    @if (session()->has('flash'))
        <script>
            $.toast({
                heading: 'Sucesso',
                text: "{{ session('flash') }}",
                icon: 'success',
                position: 'top-right',
                loader: true, // Change it to false to disable loader
                loaderBg: '#ffe500', // To change the background
                hideAfter: 8000
            })
        </script>
    @endif
    <script>
        /* ----------------LOGIN LOAD----------------*/
        document.querySelectorAll('.load').forEach(element => {
            element.style.display = 'none';
        });
        showLoad = (form) => {
            form.querySelector('.load').style.display = 'inline-block';
            form.querySelector('.btn').setAttribute('disabled', true);
        }
        /* ----------------END-LOGIN LOAD----------------*/
    </script>
    @stack('script')
</body>

</html>
