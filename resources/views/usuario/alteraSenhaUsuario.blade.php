@extends('layout.app')

@section('content')
    <div class="row">
        <h1><b>Alterar senha  <i class="fa-solid fa-key tamanho-icone-usuario"></i></b></h1>

        @if(session('error'))
            <div class="alert alert-danger">
                <b>{{ session('error') }}</b>
            </div>
        @endif

        <div class="container">
            <form action="{{ route('usuario.postAlterarSenhaPerfil', auth()->user()->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="container-fluid">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Crie sua nova senha  <i class="fa-solid fa-lock"></i></label>
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Digite a sua nova senha" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="col-sm-6">
                            <label>Confirme a sua senha  <i class="fa-solid fa-lock"></i></label>
                            <input type="password" class="form-control form-control-lg" name="confirme_password" placeholder="Confirme se digitou certo a sua nova senha" required>
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12" style="text-align: center">
                            <button class="btn btn-effect-ripple btn-success btn-lg" type="submit"><i class="fa-solid fa-check"></i> Gravar</button>
                            <a href="{{ URL('/inicial') }}" class="btn btn-effect-ripple btn-danger btn-lg"><i class="fa-solid fa-arrow-right"></i> Voltar</a>
                        </div>
                    </div>
                
                </div>
            </form>
        </div>
    </div>
@endsection