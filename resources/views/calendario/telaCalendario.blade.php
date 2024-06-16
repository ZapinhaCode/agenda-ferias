@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1><b>Calendário das solicitações aprovadas  <i class="fa-solid fa-calendar-days tamanho-icone-usuario"></i></b></h1>
        <br><br>

        @if (auth()->user()->cargo->permissao == 'administrador')
            <div class="form-group row">
                <div class="col-sm-12" style="text-align: right">
                    <button class="btn btn-effect-ripple btn-secondary" id="exportButton"><i class="fa-solid fa-download"></i> Exportar férias para xlsx</button>
                </div>
            </div>
        @endif

        <div id="calendar"></div>
    </div>

    <script>var ferias = {!! json_encode($montaArrayCalendario) !!};</script>
@endsection