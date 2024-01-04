@if ($tags_value['TAG_CUSTOMER_COMPANY']->visible ?? true)
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Nosso clientes</h2>
            <p>Conheça nossos parceiros</p>
        </header>

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @forelse ($customer_company as $value)
                <div class="swiper-slide"><img src="{{ asset("img/customer_company/{$value->logo}") }}" class="img-fluid" alt="" title="{{ $value->name }}"></div>
                @empty
                    <div class="swiper-slide"><img src="/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-pagination"></div>
                @endforelse
            </div>
            @if ($customer_company->count() > 3)
            <div class="swiper-pagination"></div>
            @endif
        </div>
    </div>
@endif
