@extends('layout.app')

@section('content')
<div class="container-md">
    <div class="container-fluid">
        @if(session('sucesso'))
            <div class="alert alert-success">
                <b>{{ session('sucesso') }}</b>
            </div>
        @endif

        <h1 style="display: inline-block"><b>Gerenciamento das solicitações  <i class="fa-solid fa-gears"></i></b></h1>

        <br><br>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-hover table-dark display" id="dataTable">
            <thead>
                <tr>
                    <th class="text-center" width="30%">Título</th>
                    <th class="text-center" width="15%">Data de início</th>
                    <th class="text-center" width="15%">Data de retorno</th>
                    <th class="text-center" width="15%">Status</th>
                    <th class="text-center" width="25%">Ações</th>
                </tr>
            </thead>

            <tbody>
                @if (!empty($ferias))
                    @foreach ($ferias as $feria)
                        <td class="text-center">{{ $feria->titulo }}</td>
                        <td class="text-center">{{ $feria->data_inicio }}</td>
                        <td class="text-center">{{ $feria->data_retorno }}</td>
                        <td class="text-center">{{ $feria->status }}</td>
                        <td class="text-center">
                            <a> <button class="btn btn-success btn-sm" title="Aprovar solicitação"><i class="fa-solid fa-thumbs-up"></i></button></a>
                            <a> <button class="btn btn-danger btn-sm" title="Rejeitar solicitação"><i class="fa-solid fa-thumbs-down"></i></button></a>
                            <a> <button class="btn btn-warning btn-sm" title="Sugerir alteração"><i class="fa-solid fa-file-pen"></i></button></a>
                        </td>
                    @endforeach
                @else
                    <td class="text-center" colspan="3">Nenhum registro encontrado</td>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection