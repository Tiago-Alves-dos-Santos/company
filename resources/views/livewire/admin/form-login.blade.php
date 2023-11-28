<div class="form">
    {{-- Be like water. --}}
    <div class="img">
        <img src="{{ asset('img/quadro_logo.png') }}" alt="">
    </div>
    <div class="title">
        <h3>Administrador</h3>
    </div>
    <form>
        <div class="row">
            <div class="col-sm-12">
                <label for="">E-mail</label>
                <input type="email" class="form-control" wire:model.live='email'>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label for="">Senha</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="show-password">
                        <i class="bi bi-eye-slash-fill"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="login-options">
            <div class="form-check">
                <input class="form-check-input pointer" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label pointer" for="flexCheckDefault">
                    Lembrar de mim
                </label>
            </div>

            <a href="#" class="link-danger">Esqueceu a senha?</a>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</div>
