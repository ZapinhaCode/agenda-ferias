@extends('layout.app')

@section('content')
    <div class="row">
        <div class="form-group">
            <h1 style="display: inline-block"><b>Tela inicial de funcionários</b></h1>
            <div class="alinha-botao-direita">
                <a href="{{ route('usuario.adicionar') }}">
                    <button class="btn btn-effect-ripple btn-outline-secondary btn-lg botao-cadastro" type="button">
                        <i class="fa-solid fa-user-plus" style="font-size: 21px"></i> Cadastrar
                    </button>
                </a>
            </div>
            <br><br>
        </div>

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
                    @if (!empty($usuarios))
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="text-center">{{ $usuario->nome }}</td>
                                <td class="text-center">{{ $usuario->cpf }}</td>
                                <td class="text-center">{{ $usuario->telefone }}</td>
                                <td class="text-center">{{ $usuario->cargo->nome }}</td>
                                <td class="text-center">{{ isset($usuario->setor) ? $usuario->setor->nome : 'Nenhum setor cadastrado' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('usuario.editar', $usuario->id) }}"><button class="btn btn-success btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="{{ route('usuario.mostrar', $usuario->id) }}"> <button class="btn btn-info btn-sm" title="Detalhes"><i class="fa-solid fa-circle-exclamation"></i></button></a> 
                                    <button class="btn btn-danger btn-sm" title="Excluir"><i class="fa-solid fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center"><b>Nenhum registro encontrado</b></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection