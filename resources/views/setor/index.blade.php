@extends('layout.app')

@section('content')
    <div class="row">
        <div class="form-group">
            @if(session('sucesso'))
                <div class="alert alert-success">
                    <b>{{ session('sucesso') }}</b>
                </div>
            @endif

            <h1 style="display: inline-block"><b>Tela inicial de setores  <i class="fa-solid fa-sitemap"></i></b></h1>

            <div class="alinha-botao-direita">
                <a href="{{ route('setor.adicionar') }}">
                    <button class="btn btn-effect-ripple btn-outline-secondary btn-lg botao-cadastro" type="button">
                        <i class="fa-solid fa-square-plus" style="font-size: 21px"></i> Cadastrar
                    </button>
                </a>
            </div>
            <br><br>
        </div>

        <div class="form-control">
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
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                </tbody>
            </table>
        </div>
    </div>
@endsection