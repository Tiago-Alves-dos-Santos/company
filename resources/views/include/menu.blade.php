<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="" class="logo d-flex align-items-center">
        <img src="/img/logo.png" alt="">
        <span class="d-lg-block d-xl-none">Soluções Software</span>
        <span class="d-xl-block d-lg-none">SSoftware</span>
    </a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
            <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
            <li><a class="nav-link scrollto" href="#features">Recursos</a></li>
            <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Projetos</a></li>
            <li><a class="nav-link scrollto" href="#testimonials">Depoimentos</a></li>
            <li><a class="nav-link scrollto" href="#team">Equipe</a></li>
            {{-- <li><a href="blog.html">Blog</a></li> --}}
            {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="#">Deep Drop Down 1</a></li>
                            <li><a href="#">Deep Drop Down 2</a></li>
                            <li><a href="#">Deep Drop Down 3</a></li>
                            <li><a href="#">Deep Drop Down 4</a></li>
                            <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Drop Down 2</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                </ul>
            </li> --}}

            {{-- <li class="dropdown megamenu"><a href="#"><span>Mega Menu</span> <i
                        class="bi bi-chevron-down"></i></a>
                <ul>
                    <li>
                        <a href="#">Column 1 link 1</a>
                        <a href="#">Column 1 link 2</a>
                        <a href="#">Column 1 link 3</a>
                    </li>
                    <li>
                        <a href="#">Column 2 link 1</a>
                        <a href="#">Column 2 link 2</a>
                        <a href="#">Column 3 link 3</a>
                    </li>
                    <li>
                        <a href="#">Column 3 link 1</a>
                        <a href="#">Column 3 link 2</a>
                        <a href="#">Column 3 link 3</a>
                    </li>
                    <li>
                        <a href="#">Column 4 link 1</a>
                        <a href="#">Column 4 link 2</a>
                        <a href="#">Column 4 link 3</a>
                    </li>
                </ul>
            </li> --}}

            <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
            @if (!AuthClient::check())
                <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal"
                        data-bs-target="#loginClient">Entrar</a></li>
            @else
                <li><a class="getstarted scrollto bg-danger" href="#" data-bs-toggle="modal"
                        data-bs-target="#loginClient">Encerrar</a></li>
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

</div>

{{-- Modals --}}
<div class="modal fade" id="loginClient" tabindex="-1" aria-labelledby="loginClientLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginClientLabel">Entrar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (!AuthClient::check())
                <h6>Entre com seu gmail e nos dê sua opnião na seção de depoimentos. Antes disso aceite os termos.</h6>
                @else
                {{-- <h6>Entre com seu gmail e nos dê sua opnião na seção de depoimentos. Antes disso aceite os termos.</h6> --}}
                @endif
                <form action="{{ route('client.login') }}" method="POST" class="d-flex flex-column">
                    @csrf
                    @if (AuthClient::check())
                        <button type="submit" name="action" value="logout" class="btn btn-lg btn-block btn-danger">
                            Encerrar sessão
                        </button>
                    @else
                        <div class="justify-content-center d-flex w-100">
                            <button type="submit" name="action" value="login" id="btn_login"
                                class="btn btn-lg btn-google" title="Aceite os termos" disabled>
                                <img src="{{ asset('img/google-48.png') }}" alt="">
                                Login com Google
                            </button>
                        </div>
                        <div class="mt-3 form-check">
                            <input class="form-check-input pointer" type="checkbox" id="check_term"
                                onchange="check_terms(this)">
                            <label class="form-check-label pointer" for="check_term">
                                Eu aceito os termos e condições da
                                <a href="{{ asset('pdf/termo.pdf') }}" target="_blank">Política de Privacidade</a>
                                da {{ config('app.name') }}
                            </label>
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>

@push('script')
    <script>
        function check_terms(input) {
            let button = document.getElementById('btn_login');
            if (input.checked == true) {
                button.removeAttribute('disabled');
            } else {
                button.setAttribute('disabled', true);
            }
        }
        let modal_loginClient = {
            isOpen: false,
            modal: new bootstrap.Modal('#loginClient', {
                keyboard:false,
                backdrop:'static',
            }),
            listenModal: null,
            interval_minutes: 7,
        };

        modal_loginClient.listenModal = () => {
            document.getElementById('loginClient').addEventListener('shown.bs.modal', event => {
                modal_loginClient.isOpen = true;
            });
            document.getElementById('loginClient').addEventListener('hide.bs.modal', event => {
                modal_loginClient.isOpen = false;
            });
        }
        modal_loginClient.listenModal();

        function showLogin() {

            setInterval(() => {
                if (!modal_loginClient.isOpen) {
                    const loginModal = new bootstrap.Modal('#loginClient');
                    loginModal.show();
                }
            }, 1000 * 60 * modal_loginClient.interval_minutes);

        }
        @if (!AuthClient::check())
            showLogin();
            modal_loginClient.modal.show();
        @endif
    </script>
@endpush
