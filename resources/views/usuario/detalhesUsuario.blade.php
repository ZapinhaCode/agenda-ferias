@extends('layout.app')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Ficha de {{ $usuario->nome }}</h4>
            </div>

            <div class="card-body p-4">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Registrado no sistema em <i class="fa-solid fa-user-plus"></i></th>
                            <td>{{ Carbon::parse($usuario->created_at)->format('d/m/Y H:i:s') }}</td>
                        </tr>

                        <tr>
                            <th scope="row">E-mail <i class="fa-solid fa-envelope"></i></th>
                            <td>{{ $usuario->email }}</td>
                        </tr>

                        <tr>
                            <th scope="row">CPF <i class="fa-solid fa-id-card"></i></th>
                            <td>{{ $usuario->cpf }}</td>
                        </tr>

                        <tr>
                            <th scope="row">RG <i class="fa-solid fa-id-card"></i></th>
                            <td>{{ $usuario->rg }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Sexo <i class="fa-solid fa-person-half-dress"></i></th>
                            <td>{{ ucfirst(strtolower($usuario->sexo)) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Data de nascimento <i class="fa-solid fa-baby"></i></th>
                            <td>{{ Carbon::parse($usuario->data_nascimento)->format('d/m/Y') }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Telefone <i class="fa-solid fa-phone"></i></th>
                            <td>{{ $usuario->telefone }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Cargo <i class="fa-solid fa-briefcase"></i></th>
                            <td>{{ $usuario->cargo->nome }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Setor <i class="fa-solid fa-sitemap"></i></th>
                            <td>{{ is_null($usuario->setor) ? 'Não foi cadastrado em um setor' : $usuario->setor->nome }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Endereço <i class="fa-solid fa-location-dot"></i></th>
                            <td>{{ $usuario->endereco }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Bairro <i class="fa-solid fa-location-dot"></i></th>
                            <td>{{ $usuario->bairro }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Número <i class="fa-solid fa-location-dot"></i></th>
                            <td>{{ $usuario->numero }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Complemento <i class="fa-solid fa-pen-clip"></i></th>
                            <td>{{ is_null($usuario->complemento) ? 'Não foi informado' : $usuario->complemento }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Estado <i class="fa-solid fa-globe"></i></th>
                            <td>{{ $usuario->estado->nome }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Cidade <i class="fa-solid fa-globe"></i></th>
                            <td>{{ $usuario->cidade->nome }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection