<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="language" content="pt-BR">
    <title>Soluções Software</title>
    <meta name="description"
        content="Oferecemos soluções modernas para o crescimento do seu negócio
Somos uma equipe de designers, desenvolvedores talentosos que criam sites,sistemas e aplicativos para seu negócio">
    <meta name="robots" content="nofollow">
    <meta name="author" content="Tiago Alves dos Santos de Oliveira">
    <meta name="keywords"
        content="Soluções Software, PDV, ERP, Vendas, Sistemas, Aplicativo celular, Aplicativo mobile">
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
    {{-- VITE --}}
    @vite(['resources/sass/app.scss', 'resources/js/site.js'])
    {{-- CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    {{-- TOAST --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
        integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- MASK --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- FIM CDN --}}
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
        /* ----------------JQUERY----------------*/
        $('.mask-cellphone').mask('(00) 0 0000-0000');
        /* ----------------END JQUERY----------------*/
    </script>
    @stack('script')
</body>

</html>
