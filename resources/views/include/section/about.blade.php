@if ($tags_value['TAG_ABOUT']->visible)
<div class="container" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3>{{ $tags_value['TAG_ABOUT']->title }}</h3>
          <h2>{{ $tags_value['TAG_ABOUT']->sub_title }}</h2>
          <p>
            {{ $tags_value['TAG_ABOUT']->text }}
          </p>
          @if ($tags_value['TAG_ABOUT']->button->visible)
          <div class="text-center text-lg-start">
            <a href="{{ $tags_value['TAG_ABOUT']->button->link }}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
              <span>{{ $tags_value['TAG_ABOUT']->button->text }}</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
          @endif
        </div>
      </div>

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        {{-- <img src="{{ asset('img/quadro_logo.png') }}" class="img-fluid" alt=""> --}}
        <img src="{{ asset('img/company/solucoes_software.png') }}" class="img-fluid" style="width: 500px; height:500px" alt="">
      </div>

    </div>
  </div>
@endif
