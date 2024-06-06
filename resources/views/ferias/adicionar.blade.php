@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1><b>Adicionar férias  <i class="fa-solid fa-calendar-plus tamanho-icone-usuario"></i></b></h1>

        @if(session('error'))
            <div class="alert alert-danger">
                <b>{{ session('error') }}</b>
            </div>
        @endif

        <div class="container-fluid">
            <form action="{{ route('ferias.salvar') }}" method="POST">
                @csrf
                @include('ferias.form_ferias')
            </form>
        </div>
    </div>
@endsection