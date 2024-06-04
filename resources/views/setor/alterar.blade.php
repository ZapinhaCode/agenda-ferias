@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h1><b>Editar cadastro do setor <i class="fa-solid fa-file-pen tamanho-icone-usuario"></i></b></h1>

        <div class="container-md">
            <form action="{{ route('setor.atualizar', $setor->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('setor.form_setor')
            </form>
        </div>
    </div>
@endsection