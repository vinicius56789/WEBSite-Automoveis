<?php
    include_once('php/conexao.php');
    $query3 = "SELECT * FROM empresa";
    $res5 = mysqli_query($con, $query3);
    $row3 = mysqli_fetch_array($res5);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="script/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/media.css">
        <script src="script/bootstrap.js"></script>
        <link rel="icon" href="imagens/icone.jpg">
        <title>Avaliação de veículo</title>
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
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="orcamento">Orçamento</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <h1 class="text-dark">Avalie seu carro com a gente</h1>
            <h5 class="text-dark text-justify">Preencha o formulário abaixo e tenha a avaliação de valor do seu veículo.</h5>
            <div class="card text-dark mb-4">
                <div class="card-body">
                        <?php 
                            if(!empty($_POST)){
                                $nome = mysqli_real_escape_string($con, $_POST['nome']);
                                $tel = mysqli_real_escape_string($con, $_POST['telefone']);
                                $celular = mysqli_real_escape_string($con, $_POST['celular']);
                                $email = mysqli_real_escape_string($con, $_POST['email']);
                                $marca = mysqli_real_escape_string($con, $_POST['marca']);
                                $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
                                $ano_fab = mysqli_real_escape_string($con, $_POST['ano_fab']);
                                $ano_modelo = mysqli_real_escape_string($con, $_POST['ano_modelo']);
                                $km = mysqli_real_escape_string($con, $_POST['km']);
                                $cor = mysqli_real_escape_string($con, $_POST['cor']);
                                $combustivel = mysqli_real_escape_string($con, $_POST['combustivel']);
                                $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
                                $query = "INSERT INTO usuvendeveic VALUES (default, '$nome', '$tel', '$celular', '$email', '$marca', '$modelo', '$ano_fab', '$ano_modelo',
                                '$km', '$cor', '$combustivel', '$descricao')";
                                $res = mysqli_query($con, $query);
                                $query2 = "INSERT INTO cliente VALUES (default, '$nome', '-', '-', '-', 'NA', '-', '-', '-', '$tel', '$celular', '$email', '-', 'M', '-', '0', '0')";
                                $res4 = mysqli_query($con, $query2);
                                $venda = "SELECT id_venda FROM usuvendeveic ORDER BY id_venda DESC LIMIT 1";
                                $res2 = mysqli_query($con, $venda);
                                $row = mysqli_fetch_array($res2);
                                $id_venda = $row['id_venda'];
                                $fotos = $_FILES['fotos'];
                                for($controle = 0; $controle < count($fotos['name']); $controle++){
                                    $extensao = ".jpg";
                                    $novo_nome = md5(time()) . rand(0,99999999) . $extensao;
                                    $diretorio = "compra/";
                                    move_uploaded_file($fotos['tmp_name'][$controle],$diretorio.$novo_nome);
                                    $salvar_imagens = "INSERT INTO imagens_venda VALUES (default, '$novo_nome', '$id_venda')";
                                    $res3 = mysqli_query($con, $salvar_imagens);
                                }
                                if($res && $res3 == 1){
                                    echo "<p class='text-center py-4 text-success'>CONTATO RECEBIDO! RETORNAREMOS O MAIS RÁPIDO POSSÍVEL.</p>";
                                }else{
                                    echo "<p class='text-center py-4 text-danger'>ERRO AO ENVIAR MENSAGEM! TENTE NOVAMENTE MAIS TARDE.</p>";
                                }
                            }
                        ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <p class="h4 text-center py-4">Informações pessoais</p>
                        <label for="nome" class="grey-text font-weight-light">Seu nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control mb-2" required/>
                        <label for="telefone" class="grey-text font-weight-light">Telefone:</label>
                        <input type="text" name="telefone" class="form-control mb-2 telefone" id="telefone" required/>
                        <label for="celular" class="grey-text font-weight-light">Celular:</label>
                        <input type="text" name="celular" class="form-control mb-2 celular" id="celular" required/>
                        <label for="email" class="grey-text font-weight-light">E-mail:</label>
                        <input type="mail" name="email" class="form-control mb-2" id="email" required/>
                        <p class="h4 text-center py-4">Informações do carro</p>
                        <label for="marca" class="grey-text font-weight-light">Marca:</label>
                        <input type="text" name="marca" class="form-control mb-2" id="marca" required/>
                        <label for="modelo" class="grey-text font-weight-light">Modelo e motor:</label>
                        <input type="text" name="modelo" class="form-control mb-2" id="modelo" required/>
                        <label for="ano_fab" class="grey-text font-weight-light">Ano de Fabricação:</label>
                        <input type="text" name="ano_fab" class="form-control mb-2 ano" id="ano_fab" required/>
                        <label for="ano_modelo" class="grey-text font-weight-light">Ano do Modelo:</label>
                        <input type="text" name="ano_modelo" class="form-control mb-2 ano" id="ano_modelo" required/>
                        <label for="km" class="grey-text font-weight-light">Quilometragem:</label>
                        <input type="text" name="km" class="form-control mb-2 km" id="km" placeholder=" Somente números" required/>
                        <label for="cor" class="grey-text font-weight-light">Cor:</label>
                        <input type="text" name="cor" class="form-control mb-2" id="cor" required/>
                        <label for="combustivel" class="grey-text font-weight-light">Combustível:</label>
                        <select name="combustivel" class="form-control mb-2" id="combustivel" required>
                            <option value selected disabled>-- SELECIONE --</option>
                            <option value="Álcool">Álcool</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Flex">Flex</option>
                            <option value="Gasolina">Gasolina</option>
                        </select>
                        <label for="fotos[]" class="grey-text font-weight-light">Nos mostre algumas imagens do veículo:</label>
                        <input type="FILE" name="fotos[]" class="form-control-file mb-2" id="fotos[]" multiple required/>
                        <p class="h4 text-center py-4">Informações adicionais</p>
                        <textarea rows="7" class="form-control mb-2" maxlength="500" name="descricao" placeholder="Este campo é opcional. Use-o para adicionais do carro, como vidro elétrico ou ar condicionado."></textarea>
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
                            <i class="fa fa-envelope mr-3"></i> <?php echo $row3['email']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row3['tel']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row3['celular']; ?></p>
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
