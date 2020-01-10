<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap required tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/main.css">
    <title>Marlon's CRM</title>
</head>

<body>
    <div id="topBannerBox">
        <div class="container">
            <a type="button" class="btn btn-light" href="/clientes">Voltar à listagem</a>
            <h2 class="blocky-text">Cadastro de cliente</h2>
        </div>
    </div>

    <div id="contentBox">
        <div class="container">
            <form id="formCriar" action="">
                <section class="row">
                    <h4 class="col-12">Dados pessoais</h4>
                    <div class="form-group col-6">
                        <label for="inputNomeCompleto">Nome completo <span class="obrigatorio">&#42;</span></label>
                        <input type="text" id="inputNomeCompleto" class="form-control" placeholder="Nome completo do cliente" maxlength="150" required>
                        <small id="helperNomeCompleto" class="form-text">Digite o nome completo no cliente</small>
                    </div>
                    <div class="form-group col-3">
                        <label for="inputDataNascimento">Data de nascimento <span class="obrigatorio">&#42;</span></label>
                        <input type="date" id="inputDataNascimento" class="form-control" required>
                        <small id="helperDataNascimento" class="form-text">Digite a data de nascimento</small>
                    </div>
                    <div class="form-group col-3">
                        <label for="selectSexo">Sexo <span class="obrigatorio">&#42;</span></label>
                        <select id="selectSexo" class="form-control" required>
                            <option selected disabled>Escolha o sexo...</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                            <option value="3">Não-binário</option>
                            <option value="0">Não informado</option>
                        </select>
                        <small id="helperSexo" class="form-text"></small>
                    </div>
                </section>

                <section class="row">
                    <h4 class="col-12">Endereço</h4>

                    <div class="form-group col-2">
                        <label for="inputCEP">CEP</label>
                        <input type="text" id="inputCEP" class="form-control" maxlength="8" placeholder="00000000">
                        <small id="helperCEP" class="form-text">Digite apenas números</small>
                    </div>
                    <div class="form-group col-5">
                        <label for="inputLogradouro">Logradouro</label>
                        <input type="text" id="inputLogradouro" class="form-control" maxlength="70" placeholder="Nome da rua, avenida, rodovia, etc">
                    </div>
                    <div class="form-group col-2">
                        <label for="inputNumero">Número</label>
                        <input type="text" id="inputNumero" class="form-control" maxlength="10" placeholder="Número externo">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" id="inputComplemento" class="form-control" maxlength="20" placeholder="Exs: Apto 5, Fundos">
                    </div>

                    <div class="form-group col-6">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" id="inputBairro" class="form-control" placeholder="Nome oficial e sem abreviações">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" id="inputCidade" class="form-control" placeholder="Nome da cidade">
                    </div>
                    <div class="form-group col-3">
                        <label for="selectEstado">Estado</label>
                        <select id="selectEstado" class="form-control">
                            <option selected disabled>Escolha o estado...</option>
                            <option value="ac">Acre</option>
                            <option value="al">Alagoas</option>
                            <option value="ap">Amapá</option>
                            <option value="am">Amazonas</option>
                            <option value="ba">Bahia</option>
                            <option value="ce">Ceará</option>
                            <option value="df">Distrito Federal</option>
                            <option value="es">Espírito Santo</option>
                            <option value="go">Goiás</option>
                            <option value="ma">Maranhão</option>
                            <option value="mt">Mato Grosso</option>
                            <option value="ms">Mato Grosso do Sul</option>
                            <option value="mg">Minas Gerais</option>
                            <option value="pa">Pará</option>
                            <option value="pb">Paraíba</option>
                            <option value="pr">Paraná</option>
                            <option value="pe">Pernambuco</option>
                            <option value="pi">Piauí</option>
                            <option value="rj">Rio de Janeiro</option>
                            <option value="rn">Rio Grande do Norte</option>
                            <option value="rs">Rio Grande do Sul</option>
                            <option value="ro">Rondônia</option>
                            <option value="rr">Roraima</option>
                            <option value="sc">Santa Catarina</option>
                            <option value="sp">São Paulo</option>
                            <option value="se">Sergipe</option>
                            <option value="to">Tocantins</option>
                        </select>
                    </div>
                </section>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="footerBox">
        <div class="container">
            <span class="copyright">&copy; 2020 Marlon Dias</span>
        </div>
    </div>

    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/clienteFormValidation.js"></script>
</body>
</html>