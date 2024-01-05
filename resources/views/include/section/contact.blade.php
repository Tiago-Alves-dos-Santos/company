<div class="container" data-aos="fade-up">

    <header class="section-header">
        <h2>Contato</h2>
        <p>Contate-nos</p>
    </header>

    <div class="row gy-4">

        <div class="col-lg-6">

            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="info-box">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Endereço</h3>
                        <p>Rua 102, Nº 47<br>Granja-CE</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <i class="bi bi-telephone"></i>
                        <h3>Celular</h3>
                        <p>
                            <a href="https://wa.link/7w0wug">(88) 9 9463-9840</a>
                            <br>
                            {{-- +1 6678 254445 41 --}}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <i class="bi bi-envelope"></i>
                        <h3>Nosso email</h3>
                        <p>
                            ssolucoessoftware@gmail.com
                            {{-- <br> --}}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <i class="bi bi-clock"></i>
                        <h3>Aberto às</h3>
                        <p>Segunda - Sábado<br>8:00 às 18:00</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <form action="{{ route('client.sendContact') }}" method="post" class="php-email-form"
                onsubmit="showLoad(this)">
                @csrf
                <div class="row gy-4">

                    @if (AuthClient::check() && !empty(AuthClient::user()->name) && empty(old('name')))
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" placeholder="Seu nome" value="{{ AuthClient::user()->name }}">
                    </div>
                    @else
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" placeholder="Seu nome">
                    </div>
                    @endif

                    @if (AuthClient::check() && !empty(AuthClient::user()->email) && empty(old('email')))
                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Seu Email" required value="{{ AuthClient::user()->email }}">
                    </div>
                    @else
                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Seu Email" required>
                    </div>
                    @endif


                    <div class="col-md-6 ">
                        <input type="text" class="form-control mask-cellphone" name="cellphone" placeholder="(00) 0 0000-0000"
                            required min="16" max="17" value="{{ old('cellphone') ?? '' }}">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject"
                            placeholder="Titulo do assunto(opcional)" required value="{{ old('subject') ?? '' }}">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="content" rows="6" placeholder="Conteúdo, seu texto" required>{{ old('content') ?? '' }}</textarea>
                    </div>

                    <div class="text-center col-md-12">
                        <button type="submit">
                            Enviar mensagem
                            <div class="spinner-border text-light load" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>

                </div>
                @if ($errors->hasBag('contact'))
                    <div class="mt-2 alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->contact->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>

        </div>

    </div>

</div>
