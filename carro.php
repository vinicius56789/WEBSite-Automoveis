<?php 
    if(empty($_GET['id'])){
        include_once('php/404.php');
    }else{
        include_once('php/conexao.php');
        $id_carro = $_GET['id'];
        $query = "SELECT * FROM carro WHERE id_carro = $id_carro";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_array($res);
        $imagens = "SELECT arquivo FROM imagens_carro WHERE id_carro = '$id_carro'";
        $res2 = mysqli_query($con, $imagens);
        $ops = "SELECT opcionais.nome FROM possui_opcionais join opcionais on opcionais.id_opcional = possui_opcionais.id_opcional WHERE possui_opcionais.id_carro = '$id_carro'";
        $res3 = mysqli_query($con, $ops);
        $query2 = "SELECT arquivo FROM imagens_carro WHERE id_carro = '$id_carro' ORDER BY id_imagem LIMIT 1";
        $res4 = mysqli_query($con, $query2);
        $ativo = mysqli_fetch_array($res4);
        $empresa = "SELECT * FROM empresa WHERE id_empresa = 1";
        $res5 = mysqli_query($con, $empresa);
        $row2 = mysqli_fetch_array($res5);
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
        <link rel="stylesheet" href="css/carssell.css">
        <link rel="icon" href="imagens/icone.jpg">
        <script src="script/bootstrap.js"></script>
        <title><?php echo $row['modelo']; ?></title>
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
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="empresa">Empresa</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="orcamento">Orçamento</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="venda">Avaliação</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb bg-light">
                        <li class="breadcrumb-item"><a class="text-dark" href="busca.php"><i class="fa fa-long-arrow-left"></i> Voltar para busca</a></li>
                    </ol>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-7">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="carssell" src="carros/<?php echo $ativo['arquivo']; ?>" class="d-block w-100">
                            </div>
                            <?php 
                                while($fotos = mysqli_fetch_array($res2)){
                                    if($fotos['arquivo'] === $ativo['arquivo']){
                                        $fotos++;
                                    }else{
                            ?>
                                <div class="carousel-item">
                                    <img class="carssell" src="carros/<?php echo $fotos['arquivo']; ?>" class="d-block w-100">
                                </div>
                                <?php }} ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-5">
                    <h1 class="font-weight-lighter"><strong><?php echo $row['marca']; echo ' '; echo $row['modelo']; ?></strong></h1>
                    <h4 class="text-right"><?php echo $row['motor']; echo ' '; echo $row['ano_modelo']; ?></h4>
                    <h2 class="text-right"><b>R$ <?php $valor = number_format($row['valor'], 2, ',','.'); echo $valor; ?></b></h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <span>Cor</span> 
                            <h4><?php echo $row['cor']; ?></h4>
                            <hr>
                        </div>
                        <div class="col-md-6 text-center">
                            <span>KM</span>
                            <h4><?php echo $row['km']; ?></h4>
                            <hr>
                        </div>
                        <div class="col-md-6 text-center">
                            <span>Combustível</span>
                            <h4><?php echo $row['combustivel']; ?></h4>
                            <hr>
                        </div>
                        <div class="col-md-6 text-center">
                            <span>Fabricação/Modelo</span>
                            <h4><?php echo $row['ano_fab']; echo '/'; echo $row['ano_modelo']; ?></h4>
                            <hr>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <a href="orcamento.php"><button type="button" class="btn btn-dark">Solicitar orçamento</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Opcionais do Veículo</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <?php 
                                while($opcionais = mysqli_fetch_array($res3)){
                            ?>
                                <div class="col-md-3">
                                    <li><b><span><?php echo $opcionais['nome'] ?></span></b></li>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>Detalhes do Veículo</h2>
                    <p class="text-justify container"><?php echo $row['descricao']; ?></p>
                </div>
            </div>
        </div>
        <footer class="page-footer font-small unique-color-dark mt-4">
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
<?php 
    }
?>