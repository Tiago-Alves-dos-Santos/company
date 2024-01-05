{{-- <div class="footer-newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-lg-12">
                <h4>Our Newsletter</h4>
                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
    </div>
</div> --}}
<div class="footer-newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center col-lg-12">
                <h4>Duvídas?</h4>
                <p>Nos informe suas duvidas também na parte de contato! Ficaremos felizes em poder ajudar.</p>
            </div>
        </div>
    </div>
</div>

<div class="footer-top">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="/img/logo.png" alt="">
                    <span>Soluções Software</span>
                </a>
                <p>
                    Criando o futuro da tecnologia para impulsionar o seu negócio. Com soluções personalizadas e inovadoras, estamos aqui para transformar suas ideias em realidade. Descubra como podemos fazer a diferença para o sucesso da sua empresa.
                </p>
                <div class="mt-3 social-links">
                    {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#hero">Início</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#about">Sobre</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#features">Recursos</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#services">Serviços</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#portfolio">Projetos</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#team">Equipe</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contato</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Nossos serviços</h4>
                <ul>
                    @forelse ($services as $value)
                    <li><i class="bi bi-chevron-right"></i> <a href="#services">{{ $value->title }}</a></li>
                    @empty
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                    @endforelse
                </ul>
            </div>

            <div class="text-center col-lg-3 col-md-12 footer-contact text-md-start">
                <h4>Contato</h4>
                <p>
                    Rua 102 <br>
                    Granja-CE<br>
                    Brasil <br><br>
                    <strong>Celular:</strong> <a href="https://wa.link/7w0wug">(88) 9 9463-9840</a><br>
                    <strong>Email:</strong> ssolucoessoftware@gmail.com<br>
                </p>

            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="copyright">
        &copy; Copyright <strong><span>Soluções Sofware</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
    </div>
</div>
