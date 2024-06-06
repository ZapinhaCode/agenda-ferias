@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h1><b>Editar cadastro do férias <i class="fa-solid fa-calendar-minus tamanho-icone-usuario"></i></b></h1>

        @if(session('error'))
            <div class="alert alert-danger">
                <b>{{ session('error') }}</b>
            </div>
        @endif

        <div class="container-md">
            <form action="{{ route('ferias.atualizar', $feria->id) }}" method="POST">
                @method('PUT')
                @csrf
                @include('ferias.form_ferias')
            </form>
        </div>
    </div>
@endsection