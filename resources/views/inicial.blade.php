@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="display-3">30</h1>
                    <p class="card-text">dias disponíveis</p>
                    <hr>
                    <p>O agendamento deve ser feito até dia <strong>20/03/2025</strong></p>
                    <a href="#" class="btn btn-primary">AGENDAR FÉRIAS</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Minhas férias</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Você não tem férias solicitadas ou agendadas.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection