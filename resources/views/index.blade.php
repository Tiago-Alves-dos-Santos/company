@extends('layout.main')

@section('before-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        @include('include.section.hero')
    </section><!-- End Hero -->
@endsection

@section('content')
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
@endsection

