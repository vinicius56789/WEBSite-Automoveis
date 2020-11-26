<?php 
    include_once('php/conexao.php');
    if(!empty($_GET['pesquisa'])){
        $texto = $_GET['pesquisa'];
        if(empty($_POST['ordem'])){
            $query = "SELECT carro.id_carro, carro.modelo, carro.marca, carro.valor, carro.ano_modelo, carro.combustivel
                FROM carro WHERE modelo LIKE '%$texto%' or marca LIKE '%$texto%' or descricao LIKE '%$texto%'";
            $res = mysqli_query($con, $query);
        }else{
            $ordem = $_POST['ordem'];
            $query = "SELECT carro.id_carro, carro.modelo, carro.marca, carro.valor, carro.ano_modelo, carro.combustivel
            FROM carro WHERE modelo LIKE '%$texto%' or marca LIKE '%$texto%' or descricao LIKE '%$texto%' $ordem";
            $res = mysqli_query($con, $query);
        }
    }else{
        if(empty($_POST['ordem'])){
            $query = "SELECT carro.id_carro, carro.modelo, carro.marca, carro.valor, carro.ano_modelo, carro.combustivel
                    FROM carro";
            $res = mysqli_query($con, $query);
        }else{
            $ordem = $_POST['ordem'];
            $query = "SELECT carro.id_carro, carro.modelo, carro.marca, carro.valor, carro.ano_modelo, carro.combustivel
            FROM carro $ordem"; 
            $res = mysqli_query($con, $query);
        }
    }
    $marcas = "SELECT DISTINCT marca FROM carro";
    $res2 = mysqli_query($con, $marcas);
    $query2 = "SELECT * FROM empresa WHERE id_empresa = 1";
    $res3 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($res3);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="script/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/media.css">
        <script src="script/bootstrap.js"></script>
        <link rel="icon" href="imagens/icone.jpg">
        <title>Estoque</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
                <a class="navbar-brand mr-5 ml-5 margem" href="index.php"><img class="rounded img" src="imagens/carro.jpg"/></a>
                    <form action="busca" method="GET">
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
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="empresa">Empresa</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="orcamento">Orçamento</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="venda">Avaliação</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <h2 class="text-dark">Nossos carros</h2>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-dark">Filtro por marca</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="text-dark mb-3 sumir">Ordenar</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 mb-1">
                            <a href="busca">Todas</a>
                        </div>
                        <?php
                            while($marca = mysqli_fetch_array($res2, MYSQLI_BOTH)){
                        ?>
                            <div class="col-md-3 mb-1">
                                <a href="busca?pesquisa=<?php echo $marca['marca']; ?>"><?php echo $marca['marca']; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="" method="POST">
                        <select class="form-control mb-3" name="ordem">
                            <option value disabled selected>Ordenar por...</option>
                            <optgroup label="Preço">
                                <option value="ORDER BY carro.valor ASC">Menor preço</option>
                                <option value="ORDER BY carro.valor DESC">Maior preço</option>
                            </optgroup>
                            <optgroup label="Modelo">
                                <option value="ORDER BY carro.modelo ASC">A-Z</option>
                                <option value="ORDER BY carro.modelo DESC">Z-A</option>
                            </optgroup>
                            <optgroup label="Marca">
                                <option value="ORDER BY carro.marca ASC">A-Z</option>
                                <option value="ORDER BY carro.marca DESC">Z-A</option>
                            </optgroup>
                            <optgroup label="Ano do carro">
                                <option value="ORDER BY carro.ano_modelo ASC">Mais antigo</option>
                                <option value="ORDER BY carro.ano_modelo DESC">Mais novo</option>
                            </optgroup>
                        </select>
                        <input type="submit" value="Filtrar">
                    </form>
                </div>
            </div>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                <?php
                    if(mysqli_num_rows($res) == 0){
                        echo "<b class='container text-dark text-uppercase'>NÃO FORAM ENCONTRADOS CARROS. VOCÊ PESQUISOU POR $texto.</b>";
                    }else{
                        while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                            $id_carro = $row['id_carro'];
                            $arquivos = "SELECT arquivo FROM imagens_carro WHERE id_carro = '$id_carro' LIMIT 1";
                            $res2 = mysqli_query($con, $arquivos);
                            $arquivo = mysqli_fetch_array($res2);
                ?>
                            <div class="col-md-4">
                                <a href="carro?id=<?php echo $row['id_carro']; ?>">
                                    <div class="card mb-4 shadow-sm">
                                    <?php if(!empty($arquivo)){ ?>
                                        <img src="carros/<?php echo $arquivo['arquivo']; ?>" class="imagem" height="250px"/>
                                    <?php }else{ ?> <img src="carros/sem-foto.jpg"/> <?php } ?>
                                        <div class="card-body">
                                            <p class="card-text text-dark"><?php echo $row['modelo']; echo ' - ' . $row['ano_modelo']; ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group text-dark">
                                                    <?php $valor = number_format($row['valor'], 2, ',','.'); echo 'R$ '.$valor; ?>
                                                </div>
                                                <small class="text-muted"><?php echo $row['marca']; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }} ?>
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
    </body>
</html>