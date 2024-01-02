<p id="profile">sdfsdf</p>
<script src="https://connect.facebook.net/en_US/sdk.js"></script>
<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
        <img src="/img/logo.png" alt="">
        {{-- SSoftware - nome curto --}}
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
                data-bs-target="#loginClient">Login</a></li>
                {{-- <li><a class="getstarted scrollto" href="#" onclick="loginWithFacebook()">Login</a></li> --}}
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
                <h1 class="modal-title fs-5" id="loginClientLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('client.login') }}" method="POST" class="d-flex justify-content-center">
                    @csrf
                    @if (AuthClient::check())
                        <button type="submit" name="action" value="logout" class="btn btn-lg btn-block btn-danger">
                            Encerrar sessão
                        </button>
                    @else
                        <button type="submit" name="action" value="login" class="btn btn-lg btn-block btn-facebook">
                            <i class="mr-2 ri-facebook-fill"></i> Login com Facebook
                        </button>
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // Inicialize o SDK do Facebook
    window.fbAsyncInit = function() {
        FB.init({
            appId: '3712235789099536',
            cookie: false,
            xfbml: true,
            version: 'v18.0' // Versão mais recente do Graph API
        });
    };

    // Carregue o SDK do Facebook de forma assíncrona
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Função para realizar o login com Facebook
    function loginWithFacebook() {
        FB.login(function(response) {
            if (response.authResponse) {
                // Login bem-sucedido, obter informações do usuário
                FB.api('/me', {
                    fields: 'id,name,email,picture'
                }, function(userData) {
                    console.log(userData);
                    // Aqui você pode usar os dados do usuário, como nome, email e foto do perfil
                });
            } else {
                // O usuário cancelou o login ou algo deu errado
                console.log('Login cancelado ou ocorreu um erro.');
            }
        }, {
            scope: 'email'
        }); // Escopo de permissão para acessar o email do usuário
    }

    function checkStatus() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
            console.log(response);
        });
    }
</script>
