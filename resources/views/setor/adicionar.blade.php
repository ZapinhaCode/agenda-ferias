@extends('layout.app')

@section('content')
    <div class="row">
        <h1><b>Adicionar setor  <i class="fa-solid fa-square-plus tamanho-icone-usuario"></i></b></h1>

        <div class="form-control">
            <form action="{{ route('setor.salvar') }}" method="POST">
                @csrf
                @include('setor.form_setor')
            </form>
        </div>
    </div>
@endsection