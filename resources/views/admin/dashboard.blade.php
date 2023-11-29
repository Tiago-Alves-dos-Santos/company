@extends('layout.admin')

@section('content')
Eu sou dashboard
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Sair</button>
    </form>
@endsection
