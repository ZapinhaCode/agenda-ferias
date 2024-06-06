@extends('layout.app')

@section('content')
        <div class="container-md">

                <h1><b>Adicionar Funcionário <i class="fa-solid fa-user-plus tamanho-icone-usuario"></i></b></h1>

                @if(session('error'))
                        <div class="alert alert-danger">
                                <b>{{ session('error') }}</b>
                        </div>
                @endif

                <div class="container-fluid">
                        <form action="{{ route('adm.usuario.salvar') }}" method="POST">
                           @csrf
                           @include('usuario.form_usuario')
                        </form>
                </div>
        </div>
@endsection