@extends('layout.app')

@section('content')
    <div class="row">
        <h1><b>Editar cadastro  <i class="fa-solid fa-user-pen tamanho-icone-usuario"></i></b></h1>

        <div class="form-control">
            <form action="{{ route('usuario.atualizar', $usuario->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('usuario.form_usuario')
            </form>
        </div>
    </div>
@endsection