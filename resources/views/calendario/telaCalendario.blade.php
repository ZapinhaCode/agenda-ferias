@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1><b>Verifica calendário  <i class="fa-solid fa-calendar-days tamanho-icone-usuario"></i></b></h1>
        <br><br>
        <div id="calendar"></div>
    </div>

    <script>var ferias = {!! json_encode($montaArrayCalendario) !!};</script>
@endsection