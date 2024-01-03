@extends('layout.center')

@section('content')
    <div class="login" x-data="{ show: false }">
        <div class="form">
            {{-- Be like water. --}}
            <div class="title">
                <h3>Esqueceu a senha</h3>
            </div>
            <form action="{{ route('password.update') }}" method="POST" id="form-login" novalidate onsubmit="showLoad(this)">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $request->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <label for="">Nova senha</label>
                        <div class="mb-3 input-group">
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
                    <div class="col-sm-12">
                        <label for="">Confirmar senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control  @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-2 justify-content-between col-sm-12 d-flex">
                    <a href="{{ route('login') }}">Voltar</a>
                    <button class="btn btn-success">
                        Redefinir senha
                        <div class="load spinner-border spinner-border-sm" role="status" id="load">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
