@extends('layout.app')

@section('content')
    <table id="tabelaUsuarios" class="table table-striped table-hover table-dark display">
        <thead>
            <tr>
                <th width="25%">Nome</th>
                <th width="25%">Título</th>
                <th width="15%">Data de início</th>
                <th width="15%">Data de retorno</th>
                <th width="20%">Ações</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="button" class="btn btn-outline-success btn-sm">Aprovar</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">Rejeitar</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">Sugerir Alteração</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection