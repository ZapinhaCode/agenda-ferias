<div class="container-fluid">
    <div class="form-group row">
        <div class="col-sm-7">
            <label for="titulo"><b>Título  <i class="fa-solid fa-file-lines"></i></b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite o título da férias" name="titulo" value="{{ isset($ferias) ? $ferias->titulo : old('titulo') }}">
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-5">
            <label for="local_ferias"><b>Local para as férias  <i class="fa-solid fa-map-location-dot"></i></b></label>
            <input type="text" placeholder="Digite o local onde passará as suas férias (opcional)" class="form-control form-control-lg" name="local_ferias" value="{{ isset($ferias) ? $ferias->local_ferias : old('local_ferias') }}">
            @error('local_ferias')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3">
            <label for="data_inicio"><b>Data de início das férias  <i class="fa-solid fa-plane-departure"></i></b></label>
            <input type="date" class="form-control form-control-lg" name="data_inicio" value="{{ isset($ferias) ? $ferias->data_inicio : old('data_inicio') }}">
            @error('data_inicio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-3">
            <label for="data_retorno"><b>Data de retorno das férias  <i class="fa-solid fa-plane-arrival"></i></b></label>
            <input type="date" class="form-control form-control-lg" name="data_retorno" value="{{ isset($ferias) ? $ferias->data_retorno : old('data_retorno') }}">
            @error('data_retorno')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-6">
            <label for="observacao"><b>Observação  <i class="fa-solid fa-file-circle-plus"></i></b></label>
            <input type="text" class="form-control form-control-lg" name="observacao" placeholder="Digite alguma observação referente ao seu pedido (opcional)" value="{{ isset($ferias) ? $ferias->observacao : old('observacao') }}"></input>
            @error('observacao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-4">
            <label for="ferias_cor"><b>Cor para marcar suas férias  <i class="fa-solid fa-palette"></i></b></label>
            <input class="form-control form-control-lg" type="color" name="ferias_cor" value="{{ isset($ferias) ? $ferias->ferias_cor : old('ferias_cor') }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12" style="text-align: center">
            <button class="btn btn-effect-ripple btn-success btn-lg" type="submit"><i class="fa-solid fa-check"></i> Gravar</button>
            <a href="{{ route('ferias.lista') }}" class="btn btn-effect-ripple btn-danger btn-lg"><i class="fa-solid fa-arrow-right"></i> Voltar</a>
        </div>
    </div>
</div>