<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: admin.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../script/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="../script/bootstrap.js"></script>
        <title>Login ADM</title>
    </head>
    <body class="text-center">
        <div class="container mt-5">
            <form class="form-signin col container-lg card" action="../php/login.php" method="POST">
                <div class="container">
                    <img class="mb-4 mt-5" src="../imagens/login.jpg" alt="" width="72" height="72">
                </div>
                <h1 class="h3 mb-3">Painel ADM - Faça login</h1>
                <div class="col container">
                    <label for="usuario" class="grey-text font-weight-light">Usuário</label>
                    <input type="text" id="usuario" class="form-control mb-2" name="usuario" required autofocus/>
                </div>
                <div class="col container">
                    <label for="senha" class="grey-text font-weight-light">Senha</label>
                    <input type="password" id="senha" class="form-control mb-3" name="senha" required/>
                </div>
                <div class="col container">
                    <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>