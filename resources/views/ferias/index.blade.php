@extends('layout.app')

@section('content')
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

        <h1 style="display: inline-block"><b>Minhas solicitações  <i class="fa-solid fa-calendar-week"></i></b></h1>

        <div class="alinha-botao-direita">
            <a href="{{ route('ferias.adicionar') }}">
                <button class="btn btn-effect-ripple btn-cadastrar btn-lg" type="button">
                    <i class="fa-regular fa-calendar-plus" style="font-size: 21px"></i> Cadastrar
                </button>
            </a>
        </div>

        <br><br>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-hover table-dark display" id="dataTable">
            <thead>
                <tr>
                    <th class="text-center" width="20%">Título</th>
                    <th class="text-center" width="15%">Data de início</th>
                    <th class="text-center" width="15%">Data de retorno</th>
                    <th class="text-center" width="15%">Status</th>
                    <th class="text-center" width="20%">Responsável</th>
                    <th class="text-center" width="15%">Ações</th>
                </tr>
            </thead>

            <tbody>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a> <button class="btn btn-warning btn-sm" title="Enviar solicitação"><i class="fa-solid fa-paper-plane"></i></button></a>
                            <a href="#"><button class="btn btn-success btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a> <button class="btn btn-info btn-sm" title="Detalhes"><i class="fa-solid fa-circle-exclamation"></i></button></a>
                            <a> <button class="btn btn-danger btn-sm" title="Excluir"><i class="fa-solid fa-circle-xmark"></i></i></button></a>
                        </td>
                {{-- @else
                    <td class="text-center" colspan="3">Nenhum registro encontrado</td>
                @endif --}}
            </tbody>
        </table>
    </div>
</div>

@endsection