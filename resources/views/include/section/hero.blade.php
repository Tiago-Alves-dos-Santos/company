@if ($tags_value['TAG_HERO']->visible)
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">{{ $tags_value['TAG_HERO']->title }}</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">{{ $tags_value['TAG_HERO']->sub_title }}</h2>
            @if ($tags_value['TAG_HERO']->button->visible)
            <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    <a href="{{ $tags_value['TAG_HERO']->button->link }}"
                        class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>{{ $tags_value['TAG_HERO']->button->text }}</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="/img/hero-img.png" class="img-fluid" alt="">
        </div>
    </div>
</div>
@endif
