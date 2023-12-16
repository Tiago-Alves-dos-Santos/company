@if ($tags_value['TAG_SERVICE']->visible)
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Serviços</h2>
            <p>Dê uma olhada nos serviços que ofertamos a sua empresa</p>
        </header>
        @php
            $colors_class = ['blue', 'orange', 'green', 'red', 'purple', 'pink'];
        @endphp
        <div class="row gy-4">
            @forelse ($services as $value)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
                    <div class="service-box {{ $colors_class[$loop->index] }}">
                        <i class="{{ $value->icon }}"></i>
                        <h3>{{ $value->title }}</h3>
                        <p>{{ $value->description }}.</p>
                        {{-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> --}}
                    </div>
                </div>
            @empty
            @endforelse

        </div>

    </div>
@endif
