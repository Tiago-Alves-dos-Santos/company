@extends('layout.admin')

@section('content')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button>Sair</button>
</form>
@endsection
