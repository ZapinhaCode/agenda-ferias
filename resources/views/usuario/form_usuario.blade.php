<div class="container">
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="email"><b>E-mail  <i class="fa-solid fa-envelope"></i></b></label>
            <input type="email" class="form-control form-control-lg" placeholder="Digite o e-mail" name="email" value="{{ isset($usuario) ? $usuario->email : null }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-6">
            <label>Senha  <i class="fa-solid fa-lock"></i></label>
            <input type="password" class="form-control form-control-lg" name="password" placeholder="Digite a sua senha">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="nome"><b>Nome do Funcionario  <i class="fa-solid fa-image-portrait"></i></b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite o nome do funcionário" name="nome" value="{{ isset($usuario) ? $usuario->nome : null }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="cpf"><b>CPF  <i class="fa-solid fa-id-card"></i></b></label>
            <input type="text" id="cpf" oninput="maskCpf(this)" maxlength="14" placeholder="Digite o CPF" class="form-control form-control-lg" name="cpf" value="{{ isset($usuario) ? $usuario->cpf : null }}">
            @error('cpf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="rg"><b>RG N.º  <i class="fa-solid fa-id-card"></i></b></label>
            <input type="text" maxlength="10" class="form-control form-control-lg" placeholder="Digite o RG" name="rg" value="{{ isset($usuario) ? $usuario->rg : null }}">
            @error('rg')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3">
            <label for="sexo"><b>Sexo  <i class="fa-solid fa-person-half-dress"></i></b></label>
            <select class="form-control form-control-lg" name="sexo" value="{{ isset($usuario) ? $usuario->sexo : null }}">
                <option value="MASCULINO">Masculino</option>
                <option value="FEMININO">Feminino</option>
            </select>
        </div>

        <div class="col-sm-3">
            <label for="data_nascimento"><b>Data Nascimento  <i class="fa-solid fa-baby"></i></b></label>
            <input type="date" class="form-control form-control-lg" name="data_nascimento" value="{{ isset($usuario) ? $usuario->data_nascimento : null }}">
            @error('data_nascimento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="telefone"><b>Telefone  <i class="fa-solid fa-phone"></i></b></label>
            <input type="tel" onkeyup="handlePhone(event)" maxlength="15" placeholder="Digite o telefone (DDD) primeiro" class="form-control form-control-lg" name="telefone" value="{{ isset($usuario) ? $usuario->telefone : null }}">
            @error('telefone')
                <div class="text-danger">{{ $message }}</div>
            @enderror        
        </div>

        <div class="col-sm-4">
            <label for="cargo_id"><b>Cargo  <i class="fa-solid fa-briefcase"></i></b></label>
            <select class="form-control form-control-lg" name="cargo_id">
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                @endforeach
            </select>
            @error('cargo_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="setor_id"><b>Setor  <i class="fa-solid fa-sitemap"></i></b></label>
            <select class="form-control form-control-lg" name="setor_id">
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                @endforeach
            </select>
            @error('setor_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="endereco"><b>Endereço  <i class="fa-solid fa-location-dot"></i></b></label>
            <input type="text"class="form-control form-control-lg" name="endereco" value="{{ isset($usuario) ? $usuario->endereco : null }}" placeholder="Digite o endereço de onde mora">
            @error('endereco')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="bairro"><b>Bairro  <i class="fa-solid fa-location-dot"></i></b></label>
            <input type="text"class="form-control form-control-lg" placeholder="Digite o bairro onde mora" name="bairro" value="{{ isset($usuario) ? $usuario->bairro : null }}">
            @error('bairro')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-4">
            <label for="numero"><b>Número  <i class="fa-solid fa-location-dot"></i></b></label>
            <input type="text"class="form-control form-control-lg" placeholder="Digite o número da casa ou do apartamento" name="numero" value="{{ isset($usuario) ? $usuario->numero : null }}">
            @error('numero')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="complemento"><b>Complemento  <i class="fa-solid fa-pen-clip"></i></b></label>
            <input type="text" class="form-control form-control-lg" placeholder="Digite um complemento do seu endereço caso precise" name="complemento" value="{{ isset($usuario) ? $usuario->complemento : null }}">
            @error('complemento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-3">
            <label for="estado_id"><b>Estado  <i class="fa-solid fa-globe"></i></b></label>
            <select class="form-control form-control-lg" name="estado_id" value="{{ isset($usuario) ? $usuario->estado_id : null }}">
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                @endforeach
            </select>
            @error('estado_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-3">
            <label for="cidade_id"><b>Cidade  <i class="fa-solid fa-globe"></i></b></label>
            <select class="form-control form-control-lg" name="cidade_id" value="{{ isset($usuario) ? $usuario->cidade_id : null }}">
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
            @error('cidade_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
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