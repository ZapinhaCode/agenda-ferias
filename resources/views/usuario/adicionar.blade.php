@extends('layout.app')

@section('content')
        <div class="row">
                <div class="form-group">
                        <div>
                                <h1><b>Adicionar Funcionário <i class="fa-solid fa-user-plus tamanho-icone-usuario"></i></b></h1>
                                <br><br>
                        </div>
                </div>

                <div class="form-control">
                        <form action="{{ route('usuario.salvar') }}" method="POST">
                           @csrf
                           @include('usuario.form_usuario')
                        </form>
                </div>
        </div>
@endsection