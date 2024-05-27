<div class="row" >
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="nome"><b>Nome do Funcionario</b></label>
            <input type="text" class="form-control form-control-lg" name="nome">
        </div>

        <div class="col-sm-4">
            <label for="cpf_cnpj"><b>CPF</b></label>
            <input type="text" id="cpf" oninput="maskCpf(this)" maxlength="14" class="form-control form-control-lg" name="cpf">
        </div>

        <div class="col-sm-4">
            <label for="num_rg"><b>RG N.º</b></label>
            <input type="text" maxlength="10" class="form-control form-control-lg" name="rg">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="email"><b>E-mail</b></label>
            <input type="email" class="form-control form-control-lg" name="email">
        </div>

        <div class="col-sm-3">
            <label for="sexo"><b>Sexo</b></label>
            <select class="form-control form-control-lg" name="sexo">
                <option value="MASCULINO">Masculino</option>
                <option value="FEMININO">Feminino</option>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="data_nascimento"><b>Data Nascimento</b></label>
            <input type="date" class="form-control form-control-lg" name="data_nascimento">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="cargo_id"><b>Cargo</b></label>
            <select class="form-control form-control-lg" name="cargo_id">
                {{-- trazer option do banco --}}
                <option value=""></option>
            </select>
        </div>

        <div class="col-sm-4">
            <label for="telefone"><b>Telefone</b></label>
            <input type="tel" onkeyup="handlePhone(event)" maxlength="15" class="form-control form-control-lg" name="telefone">
        </div>

        <div class="col-sm-4">
            <label for="cargo_id"><b>Setor</b></label>
            <select class="form-control form-control-lg" name="setor_id">
                {{-- trazer option do banco --}}
                <option value=""></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="endereco"><b>Endereço</b></label>
            <input type="text"class="form-control form-control-lg" name="endereco">
        </div>

        <div class="col-sm-4">
            <label for="bairro"><b>Bairro</b></label>
            <input type="text"class="form-control form-control-lg" name="bairro">
        </div>

        <div class="col-sm-4">
            <label for="numero_endereco"><b>Número</b></label>
            <input type="text"class="form-control form-control-lg" name="numero_endereco">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="complemento_endereco"><b>Complemento</b></label>
            <input type="text" class="form-control form-control-lg" name="complemento_endereco">
        </div>

        <div class="col-sm-3">
            <label for="estado_id"><b>Estado</b></label>
            <select class="form-control form-control-lg" name="estado_id">
                {{-- trazer option do banco --}}
                <option value=""></option>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="cidade_id"><b>Cidade</b></label>
            <select class="form-control form-control-lg" name="cidade_id">
                {{-- trazer option do banco --}}
                <option value=""></option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12" style="text-align: center">
            <button class="btn btn-effect-ripple btn-success btn-lg" type="submit">Enviar</button>
            <a href="{{ route('usuario.lista') }}" class="btn btn-effect-ripple btn-danger btn-lg">Cancelar</a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/style-usuario.css') }}">
<script src="{{ asset('js/mascaras.js') }}"></script>