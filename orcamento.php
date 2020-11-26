<?php
    include_once('php/conexao.php');
    $query = "SELECT DISTINCT id_carro, modelo FROM carro";
    $res = mysqli_query($con, $query);
    $query2 = "SELECT * FROM empresa";
    $res2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($res2);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imagens/icone.jpg">
        <script src="script/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/media.css">
        <script src="script/bootstrap.js"></script>
        <title>Financiamento</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
                <a class="navbar-brand mr-5 ml-5 margem" href="index.php"><img class="rounded img" src="imagens/carro.jpg"/></a>
                    <form action="busca.php" method="GET">
                        <div class="input-group mr-5 ml-5 media">
                            <input class="form-control mr-sm-2" type="text" placeholder="Busque por carro ou marca..." name="pesquisa" id="pesquisa">
                            <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-5" type="submit">Pesquisar</button>
                        </div>
                    </form>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="index">Home</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="busca">Estoque</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="empresa">Empresa</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="venda">Avaliação</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <h1 class="text-dark">Receba orçamento de nossos carros</h1>
            <h5 class="text-dark text-justify">Preencha o formulário abaixo e tenha retorno de um vendedor sobre o financiamento de um carro.</h5>
            <div class="card text-dark mb-4">
                <div class="card-body">
                <?php
                    if(!empty($_POST)){
                        $nome = mysqli_real_escape_string($con, $_POST['nome']);
                        $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
                        $rg = mysqli_real_escape_string($con, $_POST['rg']);
                        $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
                        $uf = mysqli_real_escape_string($con, $_POST['uf']);
                        $cidade = mysqli_real_escape_string($con, $_POST['cidade']);
                        $cep = mysqli_real_escape_string($con, $_POST['cep']);
                        $bairro = mysqli_real_escape_string($con, $_POST['bairro']);
                        $tempo_reside = mysqli_real_escape_string($con, $_POST['tempo_reside']);
                        $tipo_reside = mysqli_real_escape_string($con, $_POST['tipo_reside']);
                        $tel = mysqli_real_escape_string($con, $_POST['telefone']);
                        $celular = mysqli_real_escape_string($con, $_POST['celular']);
                        $email = mysqli_real_escape_string($con, $_POST['email']);
                        $nascimento = mysqli_real_escape_string($con, $_POST['nascimento']);
                        $sexo = mysqli_real_escape_string($con, $_POST['sexo']);
                        $e_civil = mysqli_real_escape_string($con, $_POST['e_civil']);
                        $dependentes = mysqli_real_escape_string($con, $_POST['dependentes']);
                        $nome_mae = mysqli_real_escape_string($con, $_POST['nome_mae']);
                        $nome_pai = mysqli_real_escape_string($con, $_POST['nome_pai']);
                        $profissao = mysqli_real_escape_string($con, $_POST['profissao']);
                        $admissao_empresa = mysqli_real_escape_string($con, $_POST['admissao_empresa']);
                        $salario_liq_mensal = mysqli_real_escape_string($con, $_POST['salario_liquido']);
                        $salario_brut_mensal = mysqli_real_escape_string($con, $_POST['salario_bruto']);

                        $query = "INSERT INTO dados_pessoais VALUES (default, '$nome', '$cpf', '$rg', '$endereco', '$uf', '$cidade', '$cep', '$bairro', '$tempo_reside', '$tipo_reside',
                        '$tel', '$celular', '$email', '$nascimento', '$sexo', '$e_civil', '$dependentes', '$nome_mae', '$nome_pai', '$profissao', '$admissao_empresa', '$salario_liq_mensal', '$salario_brut_mensal')";
                        $res = mysqli_query($con, $query);        
                        $cliente = "SELECT * FROM dados_pessoais ORDER BY id_pessoa DESC LIMIT 1";
                        $res2 = mysqli_query($con, $cliente);
                        $row = mysqli_fetch_array($res2);
                        $id_pessoa = $row['id_pessoa'];

                        $id_carro = mysqli_real_escape_string($con, $_POST['modelo_carro']);
                        $pago_vista = mysqli_real_escape_string($con, $_POST['pago_vista']);
                        $financiar = mysqli_real_escape_string($con, $_POST['financiar']);
                        if(!empty($_POST['comentario'])){
                            $comentario = mysqli_real_escape_string($con, $_POST['comentario']);
                        }else{
                            $comentario = "SEM COMENTÁRIOS";
                        }
                        $prestacoes = mysqli_real_escape_string($con, $_POST['prestacoes']);
                        $financiamento = "INSERT INTO bem_financiar VALUES (default, '$pago_vista', '$financiar', '$comentario', '$id_carro', '$id_pessoa', '$prestacoes')";
                        $res3 = mysqli_query($con, $financiamento);

                        $nome1 = mysqli_real_escape_string($con, $_POST['nome1']);
                        $tel1 = mysqli_real_escape_string($con, $_POST['telefone1']);
                        $cel1 = mysqli_real_escape_string($con, $_POST['celular1']);
                        $nome2 = mysqli_real_escape_string($con, $_POST['nome2']);
                        $tel2 = mysqli_real_escape_string($con, $_POST['telefone2']);
                        $cel2 = mysqli_real_escape_string($con, $_POST['celular2']);
                        $referencia = "INSERT INTO referencia VALUES (default, '$nome1', '$tel1', '$cel1', '$nome2', '$tel2', '$cel2', '$id_pessoa')";
                        $res4 = mysqli_query($con, $referencia);

                        $clientes = "INSERT INTO cliente VALUES (default, '$nome', '$cpf', '$rg', '$endereco', '$uf', '$cidade', '$cep', '$bairro', '$tel',
                        '$celular', '$email', '$nascimento', '$sexo', '$profissao', '$salario_liq_mensal', '$salario_brut_mensal')";
                        $res5 = mysqli_query($con, $clientes);
                        if($res && $res3 && $res4 && $res5 == 1){
                            echo "<p class='text-center py-4 text-success'>CONTATO RECEBIDO! RETORNAREMOS O MAIS RÁPIDO POSSÍVEL.</p>";
                        }else{
                            echo "<p class='text-center py-4 text-danger'>ERRO AO ENVIAR MENSAGEM! TENTE NOVAMENTE MAIS TARDE.</p>";
                        }
                    }
                ?>
                <form action="" method="POST">
                    <p class="h4 text-center py-4">Pessoais</p>
                    <label for="nome" class="grey-text font-weight-light">Seu nome</label>
                    <input type="text" class="form-control mb-2" id="nome" name="nome" required/>
                    <label for="cpf" class="grey-text font-weight-light">CPF:</label>
                    <input type="text" class="form-control cpf mb-2" id="cpf" name="cpf" placeholder=" Somente números" required/>
                    <label for="rg" class="grey-text font-weight-light">RG:</label>
                    <input type="text" id="rg" name="rg" class="form-control mb-2" required/>
                    <label for="endereco" class="grey-text font-weight-light">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" class="form-control mb-2" required/>
                    <label for="uf" class="grey-text font-weight-light">UF:</label>
                    <select name="uf" id="uf" class="form-control mb-2" required>
                        <option value disabled selected>-- SELECIONE -- </option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                    <label for="cidade" class="grey-text font-weight-light">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control mb-2" required/>
                    <label for="cep" class="grey-text font-weight-light">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-control mb-2 cep" required/>
                    <label for="bairro" class="grey-text font-weight-light">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="form-control mb-2" required/>
                    <label for="tempo_reside" class="grey-text font-weight-light">Tempo de residência:</label>
                    <input type="text" name="tempo_reside" id="tempo_reside" class="form-control mb-2" required/>
                    <label for="tipo_reside" class="grey-text font-weight-light">Tipo de residência:</label>
                    <select name="tipo_reside" id="tipo_reside" class="form-control mb-2" required>
                        <option value disabled selected>-- SELECIONE --</option>
                        <option value="propria">Própria</option>
                        <option value="aluguel">Aluguel</option>
                    </select>
                    <label for="telefone" class="grey-text font-weight-light">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" class="form-control telefone mb-2" placeholder=" Somente números" required/>
                    <label for="celular" class="grey-text font-weight-light">Celular:</label>
                    <input type="text" name="celular" id="celular" class="form-control celular mb-2" placeholder=" Somente números" required/>
                    <label for="email" class="grey-text font-weight-light">E-mail:</label>
                    <input type="mail" name="email" id="email" class="form-control mb-2" required/>
                    <label for="nascimento" class="grey-text font-weight-light">Nascimento:</label>
                    <input type="text" name="nascimento" id="nascimento" class="form-control nascimento mb-2" placeholder="__/__/____" required/>
                    <label for="sexo" class="grey-text font-weight-light">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-control mb-2" required>
                        <option value disabled selected>-- SELECIONE --</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                    <label for="e_civil" class="grey-text font-weight-light">Estado civil:</label>
                    <select name="e_civil" class="form-control mb-2" id="e_civil" required>
                        <option value disabled selected>-- SELECIONE --</option>
                        <option value="solteiro(a)">Solteiro(a)</option>
                        <option value="casado(a)">Casado(a)</option>
                        <option value="divorciado(a)">Divorciado(a)</option>
                        <option value="viuvo(a)">Viúvo(a)</option>
                        <option value="outro">Outros</option>
                    </select>
                    <label for="dependentes" class="grey-text font-weight-light">Dependentes:</label>
                    <input type="text" name="dependentes" id="dependentes" class="form-control dependentes mb-2" placeholder="Quantos dependentes?" required/>
                    <label for="nome_mae" class="grey-text font-weight-light">Nome da sua mãe:</label>
                    <input type="text" name="nome_mae" id="nome_mae" class="form-control mb-2" required/>
                    <label for="nome_pai" class="grey-text font-weight-light">Nome do seu pai:</label>
                    <input type="text" name="nome_pai" id="nome_pai" class="form-control mb-2" required/>
                    <p class="h4 text-center py-4">Profissionais</p>
                    <label for="profissao" class="grey-text font-weight-light">Profissão:</label>
                    <input type="text" name="profissao" id="profissao" class="form-control mb-2" placeholder=" No que trabalha?" required/>
                    <label for="admissao_empresa" class="grey-text font-weight-light">Desde quanto no atual trabalho:</label>
                    <input type="text" name="admissao_empresa" id="admissao_empresa" class="form-control nascimento mb-2" placeholder=" Empresa ou negócio próprio" required/>
                    <label for="salario_liquido" class="grey-text font-weight-light">Salário liquido:</label>
                    <input type="text" name="salario_liquido" id="salario_liquido" class="form-control valor mb-2" placeholder="Quanto recebe? (valor líquido)" required/>
                    <label for="salario_bruto" class="grey-text font-weight-light">Salário bruto:</label>
                    <input type="text" name="salario_bruto" id="salario_bruto" class="form-control valor mb-2" placeholder="Quanto recebe? (valor bruto)" required/>
                    <p class="h4 text-center py-4">Sobre o carro</p>
                    <label for="modelo_carro" class="grey-text font-weight-light">Qual carro se interessou?</label>
                    <select name="modelo_carro" id="modelo_carro" class="form-control mb-2" required>
                        <option value disabled selected>-- SELECIONE --</option>
                    <?php
                        while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                    ?>
                        <option value="<?php echo $row['id_carro']; ?>"><?php echo $row['modelo']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="pago_vista" class="grey-text font-weight-light">Quanto pretende pagar à vista?</label>
                    <input type="text" name="pago_vista" id="pago_vista" class="form-control valor mb-2" required/>
                    <label for="financiar" class="grey-text font-weight-light">Quanto pretende financiar?</label>
                    <input type="text" name="financiar" id="financiar" class="form-control valor mb-2" required/>
                    <label for="prestacoes" class="grey-text font-weight-light">Em quantas vezes?</label>
                    <input type="text" name="prestacoes" id="prestacoes" class="form-control prestacoes mb-2" placeholder="Valor aproximado de vezes" required/>
                    <p class="h4 text-center py-4">Pessoas para referência</p>
                    <label for="nome1" class="grey-text font-weight-light">Nome:</label>
                    <input type="text" name="nome1" id="nome1" class="form-control mb-2" placeholder="Nome da pessoa" required/>
                    <label for="telefone1" class="grey-text font-weight-light">Telefone:</label>
                    <input type="text" name="telefone1" id="telefone1" class="form-control telefone mb-2" placeholder="Telefone fixo da pessoa" required/>
                    <label for="celular1" class="grey-text font-weight-light">Celular:</label>
                    <input type="text" name="celular1" id="celular1" class="form-control celular mb-2" placeholder="Telefone celular da pessoa" required/>
                    <label for="nome2" class="grey-text font-weight-light">Nome:</label>
                    <input type="text" name="nome2" id="nome2" class="form-control mb-2" placeholder="Nome da pessoa" required/>
                    <label for="telefone2" class="grey-text font-weight-light">Telefone:</label>
                    <input type="text" name="telefone2" id="telefone2" class="form-control telefone mb-2" placeholder="Telefone fixo da pessoa" required/>
                    <label for="celular2" class="grey-text font-weight-light">Celular:</label>
                    <input type="text" name="celular2" id="celular2" class="form-control celular mb-2" placeholder="Telefone celular da pessoa" required/>
                    <p class="h4 text-center py-4">Informações adicionais</p>
                    <label for="comentario" class="grey-text font-weight-light">Comentário:</label>
                    <textarea rows="5" name="comentario" id="comentario" class="form-control" placeholder="Quer fazer algum comentário? (opcional)" maxlength="250"></textarea>
                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-outline-dark" type="submit">Enviar<i class="fa fa-paper-plane-o ml-2"></i></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <footer class="page-footer font-small unique-color-dark">
            <div class="bg-dark">
                <div class="container">
                    <div class="row py-4 d-flex align-items-center bg-dark">
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 text-white">Esteja conectado conosco nas redes sociais!</h6>
                        </div>
                        <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <a href="https://www.facebook.com/" class="fb-ic">
                            <i class="fa fa-facebook text-white mr-4"> </i>
                        </a>
                        <a class="tw-ic">
                            <i class="fa fa-twitter text-white mr-4"> </i>
                        </a>
                        <a href="https://www.whatsapp.com/?lang=pt_br" class="gplus-ic">
                            <i class="fa fa-whatsapp text-white mr-4"> </i>
                        </a>
                        <a href="https://www.instagram.com/?hl=pt-br" class="ins-ic">
                            <i class="fa fa-instagram text-white"> </i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center text-md-left mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">Exemplo</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px;">
                        <p>O Naruto pode ser um pouco duro às vezes, talvez você não saiba disso, mas o Naruto também cresceu sem pai. 
                        Na verdade ele nunca conheceu nenhum de seus pais, e nunca teve nenhum amigo em nossa aldeia.</p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">Páginas</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 74px;">
                        <p>
                            <a href="empresa">Empresa</a>
                        </p>
                        <p>
                            <a href="busca">Estoque</a>
                        </p>
                        <p>
                            <a href="orcamento">Solicite orçamento</a>
                        </p>
                        <p>
                            <a href="venda">Venda seu veículo</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase font-weight-bold">Localização e Contato</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 205px;">
                        <p>
                            <i class="fa fa-home mr-3"></i> Florianópolis, SC, BR</p>
                        <p>
                            <i class="fa fa-envelope mr-3"></i> <?php echo $row2['email']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row2['tel']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row2['celular']; ?></p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">Horários</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 85px;">
                        <p><b>Segunda à sexta</b></p>
                        <p>8:00 às 18:00</p>
                        <p><b>Finais de semana e feriado</b></p>
                        <p>Fechado</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2020 Copyright. Desenvolvido por
                <a href="#"> Vinicius.com</a>
            </div>
        </footer>  
            <a href="https://api.whatsapp.com/send?phone=5548998221027" target="_blank">
                <div class="whatsapp"></div>
            </a>
            <a href="https://www.instagram.com/?hl=pt-br" target="_blank">
                <div class="instagram"></div>
            </a>
            <a href="https://www.facebook.com/" target="_blank">
                <div class="facebook"></div>
            </a>
        <script src="script/mask.js"></script>
    </body>
</html>