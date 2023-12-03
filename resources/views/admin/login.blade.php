@extends('layout.center')

@section('content')
    <div class="login" x-data="{ show: false }">
        <div class="form">
            {{-- Be like water. --}}
            <div class="img" x-show="show">
                <img src="{{ asset('img/quadro_logo.png') }}" alt="">
            </div>
            <div class="title">
                <h3>Administrador</h3>
            </div>
            <form action="{{ route('login') }}" method="POST" id="form-login">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">E-mail</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Senha</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password"
                                class="form-control  @error('password') is-invalid @enderror"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="show-password" onclick="showPassword()">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login-options">
                    <div class="form-check">
                        <input class="form-check-input pointer" name="remember" type="checkbox" value=""
                            id="flexCheckDefault">
                        <label class="form-check-label pointer" for="flexCheckDefault">
                            Lembrar de mim
                        </label>
                    </div>

                    <a href="#" class="link-danger">Esqueceu a senha?</a>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" id="send">
                            Entrar
                            <div class="spinner-border spinner-border-sm" role="status" id="load">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            @push('script')
                <script>
                    function showPassword() {
                        document.getElementById('send').click();
                        var x = document.getElementById("password");
                        var span = document.getElementById("show-password");
                        if (x.type === "password") {
                            x.type = "text";
                            span.innerHTML = '<i class="bi bi-eye-fill"></i>';
                        } else {
                            x.type = "password";
                            span.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
                        }
                    }
                    document.getElementById('load').style.display = 'none';
                    document.getElementById('form-login').addEventListener('submit', function(e) {
                        document.getElementById('load').style.display = 'inline-block';
                    });

                </script>
            @endpush
        </div>
    </div>
@endsection
