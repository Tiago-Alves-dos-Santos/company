@extends('layout.center')

@section('content')
    <div class="login" x-data="{ show: false }">
        <div class="form">
            {{-- Be like water. --}}
            <div class="title">
                <h3>Esqueceu a senha</h3>
            </div>
            <form action="{{ route('password.email') }}" method="POST" id="form-login" novalidate onsubmit="showLoad(this)">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if (session('status'))
                        <div class="text-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-2 justify-content-between col-sm-12 d-flex">
                        <a href="{{ route('login') }}">Voltar</a>
                        <button class="btn btn-success">
                            Enviar email
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
