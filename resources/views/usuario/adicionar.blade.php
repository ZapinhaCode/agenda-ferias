@extends('layout.app')

@section('content')
        <form action="{{ route('usuario.salvar') }}" method="POST">
           @csrf
           @include('usuario.form_usuario')
        </form>
@endsection


