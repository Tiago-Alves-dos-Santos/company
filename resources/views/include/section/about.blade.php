<div class="container" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3>{{ $tags_value['Tag_1']->title }}</h3>
          <h2>{{ $tags_value['Tag_1']->sub_title }}</h2>
          <p>
            {{ $tags_value['Tag_1']->text }}
          </p>
          <div class="text-center text-lg-start">
            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Read More</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('img/quadro_logo.png') }}" class="img-fluid" alt="">
      </div>

    </div>
  </div>
