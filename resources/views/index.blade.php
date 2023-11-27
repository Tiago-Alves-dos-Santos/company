<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FlexStart Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('js/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/glightbox/css/glightbox.min.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        @include('include.menu')
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        @include('include.section.hero')
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            @include('include.section.about')
        </section>
        <!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">
            @include('include.section.values')
        </section><!-- End Values Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            @include('include.section.counts')
        </section><!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            @include('include.section.features')
        </section><!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            @include('include.section.services')
        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            @include('include.section.pricing')
        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            @include('include.section.ask')
        </section><!-- End F.A.Q Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            @include('include.section.projects')
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            @include('include.section.testimonials')
        </section><!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            @include('include.section.team')
        </section><!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            @include('include.section.clients-logo')
        </section><!-- End Clients Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            @include('include.section.blog-post')
        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            @include('include.section.contact')
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

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
</body>

</html>
