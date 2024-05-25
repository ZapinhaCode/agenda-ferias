<div class="row form-control fonte-padrao">
    <div class="form-group row espacamento-medio">
        <div class="col-sm-4">
            <label for="nome"><b>NOME DA PESSOA</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="nome">
        </div>

        <div class="col-sm-4">
            <label for="cpf_cnpj"><b>CPF / CNPJ</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" id="cpfCnpjInput" onkeyup="maskCpfCnpj(this)" maxlength="14" class="form-control form-control-lg rounded-0" name="cpf_cnpj">
        </div>
        
        <div class="col-sm-4">
            <label for="idade"><b>IDADE</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" maxlength="3" class="form-control form-control-lg rounded-0" name="idade">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-4">
            <label for="telefone_primario"><b>TELEFONE</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="tel" onkeyup="handlePhone(event)" maxlength="15" class="form-control form-control-lg rounded-0" name="telefone_primario">
        </div>

        <div class="col-sm-4">
            <label for="telefone_secundario"><b>TELEFONE SECUNDARIO</b></label>
            <input type="tel" onkeyup="handlePhone(event)" maxlength="15" class="form-control form-control-lg rounded-0" name="telefone_secundario">
        </div>
        
        <div class="col-sm-4">
            <label for="benefio"><b>BENEFÍCIO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="number" class="form-control form-control-lg rounded-0" name="beneficio">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-4">
            <label for="convenio"><b>CONVÊNIO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="convenio">
        </div>

        <div class="col-sm-4">
            <label for="desc_convenio"><b>DESCRIÇÃO CONVÊNIO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="desc_convenio">
        </div>
        
        <div class="col-sm-4">
            <label for="margem"><b>MARGEM (R$)</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="margem" id="campoMoeda" oninput="formatarMoeda(this)">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-6">
            <label for="email"><b>E-MAIL PARTICULAR</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="email" class="form-control form-control-lg rounded-0" name="email">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-3">
            <label for="chave_pix"><b>CHAVE PIX</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="chave_pix">
        </div>

        <div class="col-sm-3">
            <label for="banco_nome"><b>BANCO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="banco_nome">
        </div>
        
        <div class="col-sm-3">
            <label for="banco_agencia"><b>AGÊNCIA</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="banco_agencia">
        </div>

        <div class="col-sm-3">
            <label for="banco_conta"><b>CONTA</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="banco_conta">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-3">
            <label for="sexo"><b>SEXO</b></label>
            <select class="form-control form-control-lg rounded-0" name="sexo">
                <option value="MASCULINO">Masculino</option>
                <option value="FEMININO">Feminino</option>
            </select>                 
        </div>

        <div class="col-sm-3">
            <label for="data_nascimento"><b>DATA NASCIMENTO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="data_nascimento" id="dateInput" onkeyup="maskDate(this)">
        </div>
        
        <div class="col-sm-3">
            <label for="naturalidade"><b>NATURALIDADE (CIDADE E ESTADO)</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="naturalidade">
        </div>

        <div class="col-sm-3">
            <label for="nacionalidade"><b>NACIONALIDADE</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="nacionalidade">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-3">
            <label for="num_rg"><b>RG N.º</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" maxlength="10" class="form-control form-control-lg rounded-0" name="num_rg">
        </div>

        <div class="col-sm-3">
            <label for="data_emissao"><b>DATA EMISSÃO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="data_emissao" id="dateInput" onkeyup="maskDate(this)">
        </div>
        
        <div class="col-sm-3">
            <label for="orgao_emissor"><b>ÓRGÃO EMISSOR</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="orgao_emissor">
        </div>

        <div class="col-sm-3">
            <label for="uf"><b>UF</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="uf">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-3">
            <label for="meu_inss"><b>MEU INSS</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" maxlength="10" class="form-control form-control-lg rounded-0" name="meu_inss">
        </div>

        <div class="col-sm-3">
            <label for="especie_inss"><b>ESPÉCIE INSS</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="especie_inss">
        </div>
        
        <div class="col-sm-3">
            <label for="orgao_beneficio"><b>ÓRGÃO DO BENEFÍCIO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="orgao_beneficio">
        </div>

        <div class="col-sm-3">
            <label for="funcao_siape"><b>FUNÇÃO SIAPE</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="funcao_siape">
        </div>
    </div>

    <div class="form-group row espacamento-medio">
        <div class="col-sm-4">
            <label for="observacoes"><b>OBSERVAÇÕES</b></label>
            <textarea class="form-control form-control-lg rounded-0" name="observacoes"></textarea>
        </div>

        <div class="col-sm-4">
            <label for="endereco"><b>ENDEREÇO</b> <i class="text-danger" title="Campo obrigatório">*</i></label>
            <input type="text" class="form-control form-control-lg rounded-0" name="endereco">
        </div>
        
        <div class="col-sm-4">
            <label for="complemento"><b>COMPLEMENTO</b></label>
            <textarea class="form-control form-control-lg rounded-0" name="complemento"></textarea>
        </div>
    </div>
</div>