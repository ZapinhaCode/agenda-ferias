@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1><b>Adicionar setor  <i class="fa-solid fa-square-plus tamanho-icone-usuario"></i></b></h1>

        <div class="container-fluid">
            <form action="{{ route('adm.setor.salvar') }}" method="POST">
                @csrf
                @include('setor.form_setor')
            </form>
        </div>
    </div>
@endsection