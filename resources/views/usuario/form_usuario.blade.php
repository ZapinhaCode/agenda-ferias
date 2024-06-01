<div class="container">
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="email"><b>E-mail</b></label>
            <input type="email" class="form-control form-control-lg" placeholder="Digite o e-mail" name="email" value="{{ isset($usuario) ? $usuario->email : null }}">
        </div>

        <div class="col-sm-6">
            <label>Senha</label>
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Digite a sua senha">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="nome"><b>Nome do Funcionario</b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite o nome do funcionário" name="nome" value="{{ isset($usuario) ? $usuario->nome : null }}">
        </div>

        <div class="col-sm-4">
            <label for="cpf_cnpj"><b>CPF</b></label>
            <input type="text" id="cpf" oninput="maskCpf(this)" maxlength="14" placeholder="Digite o CPF" class="form-control form-control-lg" name="cpf" value="{{ isset($usuario) ? $usuario->cpf : null }}">
        </div>

        <div class="col-sm-4">
            <label for="num_rg"><b>RG N.º</b></label>
            <input type="text" maxlength="10" class="form-control form-control-lg" placeholder="Digite o RG" name="rg" value="{{ isset($usuario) ? $usuario->rg : null }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3">
            <label for="sexo"><b>Sexo</b></label>
            <select class="form-control form-control-lg" name="sexo" value="{{ isset($usuario) ? $usuario->sexo : null }}">
                <option value="MASCULINO">Masculino</option>
                <option value="FEMININO">Feminino</option>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="data_nascimento"><b>Data Nascimento</b></label>
            <input type="date" class="form-control form-control-lg" name="data_nascimento" value="{{ isset($usuario) ? $usuario->data_nascimento : null }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="telefone"><b>Telefone</b></label>
            <input type="tel" onkeyup="handlePhone(event)" maxlength="15" placeholder="Digite o telefone (DDD) primeiro" class="form-control form-control-lg" name="telefone" value="{{ isset($usuario) ? $usuario->telefone : null }}">
        </div>

        <div class="col-sm-4">
            <label for="cargo_id"><b>Cargo</b></label>
            <select class="form-control form-control-lg" name="cargo_id">
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-4">
            <label for="cargo_id"><b>Setor</b></label>
            <select class="form-control form-control-lg" name="setor_id">
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="endereco"><b>Endereço</b></label>
            <input type="text"class="form-control form-control-lg" name="endereco" value="{{ isset($usuario) ? $usuario->endereco : null }}" placeholder="Digite o endereço de onde mora">
        </div>

        <div class="col-sm-4">
            <label for="bairro"><b>Bairro</b></label>
            <input type="text"class="form-control form-control-lg" placeholder="Digite o bairro onde mora" name="bairro" value="{{ isset($usuario) ? $usuario->bairro : null }}">
        </div>

        <div class="col-sm-4">
            <label for="numero_endereco"><b>Número</b></label>
            <input type="text"class="form-control form-control-lg" placeholder="Digite o número da casa ou do apartamento" name="numero" value="{{ isset($usuario) ? $usuario->numero : null }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="complemento"><b>Complemento</b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite um complemento do seu endereço caso precise" name="complemento" value="{{ isset($usuario) ? $usuario->complemento : null }}">
        </div>

        <div class="col-sm-3">
            <label for="estado_id"><b>Estado</b></label>
            <select class="form-control form-control-lg" name="estado_id" value="{{ isset($usuario) ? $usuario->estado_id : null }}">
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-3">
            <label for="cidade_id"><b>Cidade</b></label>
            <select class="form-control form-control-lg" name="cidade_id" value="{{ isset($usuario) ? $usuario->cidade_id : null }}">
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12" style="text-align: center">
            <button class="btn btn-effect-ripple btn-success btn-lg" type="submit"><i class="fa-solid fa-check"></i> Gravar</button>
            <a href="{{ route('usuario.lista') }}" class="btn btn-effect-ripple btn-danger btn-lg"><i class="fa-solid fa-arrow-right"></i> Voltar</a>
        </div>
    </div>
</div>

<script src="{{ asset('js/mascaras.js') }}"></script>