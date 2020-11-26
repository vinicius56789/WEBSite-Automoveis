<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
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
        <title>Cadastrar opcional</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1>Cadastrar novo opcional</h1>
            <label>Nome do opcional:</label>
            <form action="" method="POST">
                <input type="text" name="opcional" id="opcional" class="form-control mb-2"/>
                <input type="submit" value="Cadastrar"/>
            </form>
            <a href="admin.php">Voltar</a><br/>
        </div>
        
    </body>
</html>
<?php
    if(!empty($_POST)){
        if($_POST['opcional'] != null){
            $opcional = $_POST['opcional'];
            $query = "INSERT INTO opcionais VALUES (default, '$opcional')";
            $res = mysqli_query($con, $query);
            if($res == 1){
                echo "<p class='container text-success'>CADASTRADO COM SUCESSO!</p>";
            }else{
                echo "<p class='container text-danger'>ERRO AO CADASTRAR. CONTACTE O SUPORTE!</p>";
            }
        }else{
            echo "<p class='container text-danger'>ERRO, NOME INVÁLIDO</p>";
        }
    }
?>