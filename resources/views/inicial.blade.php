@extends('layout.app')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="container mt-4">
        @if(session('sucesso'))
            <div class="alert alert-success">
                <b class="text-body-secondary">{{ session('sucesso') }}</b>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                <b class="text-body-secondary">{{ session('error') }}</b>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="display-3">{{ $diasParaFerias }}</h1>
                        <p class="card-text">dias disponíveis</p>
                        <hr>
                        <p>O agendamento deve ser feito até dia <strong>{{ Carbon::parse($dataLimiteFerias)->format('d/m/Y') }}</strong></p>
                        <a href="{{ route('ferias.lista') }}" class="btn btn-primary">AGENDAR FÉRIAS</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Minhas férias</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-dark display">
                            <thead>
                                <tr>
                                    <th class="text-center" width="20%">Título</th>
                                    <th class="text-center" width="15%">Data de início</th>
                                    <th class="text-center" width="15%">Data de retorno</th>
                                    <th class="text-center" width="15%">Status</th>
                                    <th class="text-center" width="20%">Responsável</th>
                                </tr>
                            </thead> 
                            
                            <tbody>
                                @if (!is_null($ferias))
                                    @foreach ($ferias as $feria)
                                        <tr>
                                            <td class="text-center">{{ $feria->titulo }}</td>
                                            <td class="text-center">{{ Carbon::parse($feria->data_inicio)->format('d/m/Y') }}</td>
                                            <td class="text-center">{{ Carbon::parse($feria->data_retorno)->format('d/m/Y') }}</td>
                                            <td class="text-center">{{ is_null($feria->status) ? 'Não enviada para análise' : ($feria->status == 'solicitaAlteracao' ? 'Solicitou alteração' : ucfirst(strtolower($feria->status))) }}</td>
                                            <td class="text-center">{{ is_null($feria->user_autorizacao_id) ? 'Sem resposta' : $feria->usuarioAutoriza->nome }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="4">Você não tem férias solicitadas ou agendadas.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection