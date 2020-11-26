<?php 
    include_once('php/conexao.php');
    $query = "SELECT * FROM empresa";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
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
        <link rel="icon" href="imagens/icone.jpg">
        <script src="script/bootstrap.js"></script>
        <title>Nossa Empresa</title>
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
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="orcamento">Orçamento</a></li>
                        <li class="nav-item mr-5"><a class="nav-link text-white" href="venda">Avaliação</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Bem vindo a Exemplo!</h1>
                <p class="texto"><?php echo $row['descricao']; ?></p>
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3538.6772250383556!2d-48.48821968466314!3d-27.510412025022614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9527472818b9fc5b%3A0x787623755dd928ed!2sServid%C3%A3o%20Lino%20Pedro%20Machado%2C%202%20-%20Ratones%2C%20Florian%C3%B3polis%20-%20SC%2C%2088052-135!5e0!3m2!1spt-PT!2sbr!4v1596161792894!5m2!1spt-PT!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <h6>Venha conhecer nossa loja!</h6>
                <p><a class="btn btn-dark btn-lg" href="busca" role="button">Ver carros &raquo;</a></p>
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
                            <i class="fa fa-envelope mr-3"></i> <?php echo $row['email']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row['tel']; ?></p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> <?php echo $row['celular']; ?></p>
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