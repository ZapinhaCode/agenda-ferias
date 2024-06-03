<div class="container">
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="nome"><b>Nome do setor  <i class="fa-solid fa-image-portrait"></i></b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite o nome do setor" name="nome" value="{{ isset($setor) ? $setor->nome : null }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="gerente_user_id"><b>Gerente responsável  <i class="fa-solid fa-id-card"></i></b></label>
            <select class="form-control form-control-lg" name="gerente_user_id" value="{{ isset($setor) ? $setor->gerente_user_id : null }}">
                    <option value="nenhum">Nenhum</option>
            </select>
            @error('gerente_user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12" style="text-align: center">
            <button class="btn btn-effect-ripple btn-success btn-lg" type="submit"><i class="fa-solid fa-check"></i> Gravar</button>
            <a href="{{ route('setor.lista') }}" class="btn btn-effect-ripple btn-danger btn-lg"><i class="fa-solid fa-arrow-right"></i> Voltar</a>
        </div>
    </div>
</div>