
 

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Ficha de Férias do Usuário {{ $ferias->user->nome }}</h4>
            </div>

            <div class="card-body p-4">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Título <i class="fa-solid fa-heading"></i></th>
                            <td>{{ $ferias->titulo }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Observação <i class="fa-solid fa-note-sticky"></i></th>
                            <td>{{ $ferias->observacao }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Data de Início <i class="fa-solid fa-calendar"></i></th>
                            <td>{{ Carbon::parse($ferias->data_inicio)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Data de Retorno <i class="fa-solid fa-calendar"></i></th>
                            <td>{{ Carbon::parse($ferias->data_retorno)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Local das Férias <i class="fa-solid fa-location-dot"></i></th>
                            <td>{{ $ferias->local_ferias }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status <i class="fa-solid fa-info-circle"></i></th>
                            <td>{{ ucfirst($ferias->status) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Autorizado por <i class="fa-solid fa-user-check"></i></th>
                            <td>{{ $ferias->user_autorizacao_id ? $ferias->autorizador->nome : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Data de Criação <i class="fa-solid fa-calendar-plus"></i></th>
                            <td>{{ Carbon::parse($ferias->created_at)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Última Atualização <i class="fa-solid fa-calendar-check"></i></th>
                            <td>{{ Carbon::parse($ferias->updated_at)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Enviado para Solicitação <i class="fa-solid fa-envelope"></i></th>
                            <td>{{ $ferias->enviado_solicitacao ? 'Sim' : 'Não' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Cor das Férias <i class="fa-solid fa-palette"></i></th>
                            <td style="background-color: {{ $ferias->ferias_cor }};">{{ $ferias->ferias_cor }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection