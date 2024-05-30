@extends('layout.app')

@section('content')
    <div class="row">
        <div class="form-control">
            <table class="table table-striped table-hover table-dark display" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="20%">Nome do Funcionário</th>
                        <th class="text-center" width="20%">CPF</th>
                        <th class="text-center" width="15%">Telefone</th>
                        <th class="text-center" width="15%">Cargo</th>
                        <th class="text-center" width="15%">Setor</th>
                        <th class="text-center" width="15%">Ações</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="text-center">{{ $usuario->nome }}</td>
                            <td class="text-center">{{ $usuario->cpf }}</td>
                            <td class="text-center">{{ $usuario->telefone }}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <a href="{{ route('usuario.editar', $usuario->id) }}"><button class="btn btn-success btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="{{ route('usuario.mostrar', $usuario->id) }}"> <button class="btn btn-info btn-sm" title="Detalhes"><i class="fa-solid fa-circle-exclamation"></i></button></a> 
                                <button class="btn btn-danger btn-sm" title="Excluir"><i class="fa-solid fa-circle-xmark"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection