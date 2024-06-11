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

            <h1 style="display: inline-block"><b>Tela inicial de setores  <i class="fa-solid fa-sitemap"></i></b></h1>

            <div class="alinha-botao-direita">
                <a href="{{ route('adm.setor.adicionar') }}">
                    <button class="btn btn-effect-ripple btn-cadastrar btn-lg" type="button">
                        <i class="fa-solid fa-square-plus" style="font-size: 21px"></i> Cadastrar
                    </button>
                </a>
            </div>
            <br><br>
        </div>

        <div class="container-fluid">
            <table class="table table-striped table-hover table-dark display" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="30%">Nome do setor</th>
                        <th class="text-center" width="30%">Gerente responsável</th>
                        <th class="text-center" width="20%">Data que foi cadastrado</th>
                        <th class="text-center" width="20">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @if(!empty($setores))
                        @foreach ($setores as $setor)
                            <tr>
                                <td class="text-center">{{ $setor->nome }}</td>
                                <td class="text-center">{{ $setor->gerente->nome }}</td>
                                <td class="text-center">{{ $setor->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('adm.setor.editar', $setor->id) }}" class="d-inline-block">
                                        <button class="btn btn-warning btn-sm" title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </a>

                                    <a class="d-inline-block">
                                        <button class="btn btn-info btn-sm" title="Detalhes">
                                            <i class="fa-solid fa-circle-exclamation"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('adm.setor.excluir', $setor->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
                            <td class="text-center" colspan="3">Nenhum registro encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection