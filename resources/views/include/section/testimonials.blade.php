<div class="modal fade" id="feedback-client" tabindex="-1" aria-labelledby="loginClientLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginClientLabel">Depoimento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('client.depoiment') }}" method="POST" novalidate onsubmit="showLoad(this)">
                    @csrf
                    <input type="hidden" name="rating" value="-1" id="note">
                    <div class="mb-2 row">
                        <div class="col-md-12">
                            <h4>De 0 a 5 qual nota nos dá:</h4>
                        </div>
                        <div class="col-md-12" id="container-star">
                            @for ($i = 0; $i < 5; $i++)
                                <img src="{{ asset('img/star-32.png') }}" style="opacity: .3; cursor: pointer"
                                    class="star" onmouseover="starMouseOver({{ $i }})"
                                    onmouseout="starMouseOut({{ $i }})"
                                    onclick="starClick({{ $i }})" />
                            @endfor

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Qual seu emprego, trabalho ou função?</label>
                            <span class="form-text d-block">
                                Ex: Vendedor, Dono - Amigos&Cia
                            </span>
                            @if (AuthClient::check() && !empty(AuthClient::user()->work) && empty(old('work')))
                            <input type="text" name="work" id="" class="form-control" placeholder=""
                                value="{{ AuthClient::user()->work }}">
                            @else
                            <input type="text" name="work" id="" class="form-control" placeholder=""
                                value="{{ old('work') ?? '' }}">
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if (AuthClient::check())
                                <label for="">Sobre a empresa, o que pensa Sr(a):
                                    {{ AuthClient::user()->name }}</label>
                            @endif
                            <textarea name="feedback" id="" cols="30" rows="10" class="form-control">{{ old('feedback') ?? '' }}</textarea>
                            <span class="form-text d-block">
                                Atenção! Por favor não usar de baixo linguajar no depoimento, caso não cumpra esse aviso
                                seu depoimento não sera exibido
                            </span>
                        </div>
                    </div>
                    <div class="mt-2 row">
                        <div class="col-sm-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-success">
                                Enviar
                                <div class="load spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    @if ($errors->hasBag('depoiment'))
                        <div class="mt-2 alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->depoiment->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>
            </div>

        </div>
    </div>
</div>


<div class="container" data-aos="fade-up">

    <header class="section-header">
        <h2>Depoimentos</h2>
        <p>O que estão dizendo sobre nós</p>
        <div class="mt-2">
            @if (AuthClient::check())
                <button style="background-color: #4154f1;border:none; padding: 5px 10px; color:white; border-radius:4px"
                    data-bs-toggle="modal" data-bs-target="#feedback-client">
                    Diga-nos seu depoimento
                </button>
            @else
                <button style="background-color: #4154f1;border:none; padding: 5px 10px; color:white; border-radius:4px"
                    data-bs-toggle="modal" data-bs-target="#loginClient">
                    Diga-nos seu depoimento
                </button>
            @endif
        </div>
    </header>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">

            @forelse ($feedbacks as $value)
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <div class="stars">
                        @for ($i = 0; $i < $value->rating; $i++)
                        <i class="bi bi-star-fill"></i>
                        @endfor
                    </div>
                    <p>
                        {{ $value->feedback }}
                    </p>
                    <div class="mt-auto profile">
                        <img src="{{ $value->client->profile_photo_link }}" class="testimonial-img" alt="">
                        <h3>{{ $value->client->name }}</h3>
                        <h4>{{ $value->client->work }}</h4>
                        {{-- <h4>Ceo &amp; Founder</h4> --}}
                    </div>
                </div>
            </div>
            @empty

            @endforelse
            {{-- <div class="swiper-slide">
                <div class="testimonial-item">
                    <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                        rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                        risus at semper.
                    </p>
                    <div class="mt-auto profile">
                        <img src="/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                    </div>
                </div>
            </div><!-- End testimonial item --> --}}



        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
@push('script')
    @if ($errors->hasBag('depoiment'))
        <script type="module">
            const feedbacktModal = new window.bootstrap.Modal('#feedback-client');
            feedbacktModal.show();
        </script>
    @endif
    <script>
        /* ----------------STARSTORE----------------*/
        const stars = document.querySelectorAll('.star');

        document.getElementById('container-star').addEventListener('mouseout', () => {
            stars.forEach(element => {
                element.style.opacity = '.3';
            });
        });

        let starMouseOver = (position) => {
            for (let i = 0; i <= position; i++) {
                stars[i].style.opacity = '1';
            }
        }
        let starMouseOut = (position) => {
            for (let i = position; i <= (stars.length - 1); i++) {
                stars[i].style.opacity = '.3';
            }
        }

        let note = document.getElementById('note')
        let starClick = (position) => {
            let max_index = (stars.length - 1);
            if (position == max_index) {
                for (let i = 0; i <= max_index; i++) {
                    stars[i].classList.add('selected-star');
                }
            } else if (position == 0) {
                for (let i = max_index; i > 0; i--) {
                    stars[i].classList.remove('selected-star');
                }
            } else if (position > 0 && position < max_index) {
                for (let i = 0; i <= position; i++) {
                    stars[i].classList.add('selected-star');
                }
                for (let i = (position + 1); i <= max_index; i++) {
                    stars[i].classList.remove('selected-star');
                }
            }
            //set position value in hidden input
            note.value = position + 1;

        }
        /* ----------------END-STARSTORE----------------*/
    </script>
@endpush
