@extends('layout.app')

@section('content')
    <div class="container-md">
        <div class="container-fluid">
            @if(session('sucesso'))
                <div class="alert alert-success">
                    <b class="text-body-secondary">{{ session('sucesso') }}</b>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    <b class="text-body-secondary">{{ session('error') }}</b>
                </div>
            @endif

            <h1 style="display: inline-block"><b>Tela inicial de funcionários  <i class="fa-solid fa-users-gear tamanho-icone-usuario"></i></b></h1>

            <div class="alinha-botao-direita">
                <a href="{{ route('adm.usuario.adicionar') }}">
                    <button class="btn btn-effect-ripple btn-cadastrar btn-lg" type="button">
                        <i class="fa-solid fa-user-plus" style="font-size: 21px"></i> Cadastrar
                    </button>
                </a>
            </div>
            <br><br>
        </div>

        <div class="container-fluid">
            <table class="table table-striped table-hover table-dark display" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="20%">Nome do Funcionário</th>
                        <th class="text-center" width="20%">CPF</th>
                        <th class="text-center" width="13%">Telefone</th>
                        <th class="text-center" width="15%">Cargo</th>
                        <th class="text-center" width="19%">Setor</th>
                        <th class="text-center" width="13%">Ações</th>
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
                                    <a href="{{ route('adm.usuario.editar', $usuario->id) }}" class="d-inline-block">
                                        <button class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>

                                    <a class="d-inline-block" href="{{ route('adm.usuario.mostrar', $usuario->id) }}">
                                        <button class="btn btn-info btn-sm" title="Detalhes">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('adm.usuario.excluir', $usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
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