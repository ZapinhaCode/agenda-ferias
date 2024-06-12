@extends('layout.app')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="container-md">
        <div class="container-fluid">
            @if(session('sucesso'))
                <div class="alert alert-success">
                    <b>{{ session('sucesso') }}</b>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    <b>{{ session('error') }}</b>
                </div>
            @endif

            <h1 style="display: inline-block"><b>Gerenciamento das solicitações  <i class="fa-solid fa-gears"></i></b></h1>

            <br><br>
        </div>

        <div class="container-fluid">
            <table class="table table-striped table-hover table-dark display" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="35%">Título</th>
                        <th class="text-center" width="15%">Data de início</th>
                        <th class="text-center" width="15%">Data de retorno</th>
                        <th class="text-center" width="15%">Status</th>
                        <th class="text-center" width="20%">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($ferias))
                        @foreach ($ferias as $feria)
                            <tr>
                                <td class="text-center">{{ $feria->titulo }}</td>
                                <td class="text-center">{{ Carbon::parse($feria->data_inicio)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ Carbon::parse($feria->data_retorno)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ ucfirst(strtolower($feria->status)) }}</td>
                                <td class="text-center">
                                    <a><button class="btn btn-info btn-sm" title="Visualizar férias" data-bs-toggle="modal" data-bs-target="#feriasModal"><i class="fa-solid fa-eye"></i></button></a>

                                    <form action="{{ route('adm.ferias.aprovaSolicitacao', $feria->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success btn-sm" title="Aprovar solicitação"><i class="fa-solid fa-thumbs-up"></i></button>
                                    </form>

                                    <form action="{{ route('adm.ferias.recusaSolicitacao', $feria->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger btn-sm" title="Rejeitar solicitação"><i class="fa-solid fa-thumbs-down"></i></button>
                                    </form>

                                    <a> <button class="btn btn-warning btn-sm" title="Sugerir alteração" data-bs-toggle="modal" data-bs-target="#sugerirAlteracao"><i class="fa-solid fa-file-pen"></i></button></a>
                                </td>
                            </tr>
                        @endforeach                        
                    @else
                        <tr>
                            <td class="text-center" colspan="4">Nenhum registro encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection