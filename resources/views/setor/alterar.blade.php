@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h1><b>Editar cadastro do setor <i class="fa-solid fa-file-pen tamanho-icone-usuario"></i></b></h1>

        @if(session('error'))
            <div class="alert alert-danger">
                <b>{{ session('error') }}</b>
            </div>
        @endif

        <div class="container-md">
            <form action="{{ route('adm.setor.atualizar', $setor->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('setor.form_setor')
            </form>
        </div>
    </div>
@endsection