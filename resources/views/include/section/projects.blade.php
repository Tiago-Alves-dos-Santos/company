@if ($tags_value['TAG_PROJECTS']->visible  ?? false)
<div class="container" data-aos="fade-up">

    <header class="section-header">
        <h2>Projetos</h2>
        <p>Veja imagens de trabalhos entregues</p>
    </header>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">Todos</li>
                @forelse ($categories as $value)
                <li data-filter=".filter-{{ $value->title }}">{{ str_replace( "_"," ", $value->title) }}</li>
                @empty
                @endforelse
                {{-- <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li> --}}
            </ul>
        </div>
    </div>

    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @forelse ($images as $value)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $value->project->projectCategory->title }}">
            <div class="portfolio-wrap">
                <img src="{{ asset("img/project/".$value->image) }}" style="width:420px; height:312px" alt="">
                <div class="portfolio-info">
                    <h4>{{ $value->project->title }}</h4>
                    <p>{{ $value->project->projectCategory->title }}</p>
                    <div class="portfolio-links">
                        <a href="{{ asset("img/project/".$value->image) }}" data-gallery="portfolioGallery"
                            class="portfokio-lightbox" title="{{ $value->project->title }}"><i class="bi bi-plus"></i></a>
                        {{-- <a href="portfolio-details.html" title="More Details"><i
                                class="bi bi-link"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        @empty

        @endforelse

    </div>
</div>
@endif
