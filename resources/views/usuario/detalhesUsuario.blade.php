@extends('layout.app')

@section('content')
    <div class="row">
        <h1><b>Ficha de {{ $usuario->nome . '  ' }}  <i class="fa-solid fa-user-tie tamanho-icone-usuario"></i></b></h1>

        <div class="container-fluid">
            <table class="table table-striped table-hover table-dark display">
                <thead>
                    <tr>
                        <td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection