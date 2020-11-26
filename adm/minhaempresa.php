<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $query = "SELECT * FROM empresa WHERE id_empresa = 1";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../script/jquery.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="../script/bootstrap.js"></script>
        <title>Editar dados da empresa</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1>Editar dados da Empresa</h1>
            <form action="" method="POST">
                <label>Telefone:</label>
                <input type="tel" value="<?php echo $row['tel']; ?>" name="telefone" class="form-control"/>
                <label>Celular:</label>
                <input type="tel" value="<?php echo $row['celular']; ?>" name="celular" class="form-control"/>
                <label>Email:</label>
                <input type="mail" value="<?php echo $row['email']; ?>" name="email" class="form-control"/>
                <label>Descrição:</label>
                <textarea class="form-control mb-2" rows="15" name="descricao"><?php echo $row['descricao']; ?></textarea>
                <input type="submit" value="Editar"/>
            </form>
            <a href="admin.php">Voltar</a>
        </div>
    </body>
</html>

<?php
    if(!empty($_POST)){
        $tel = mysqli_real_escape_string($con, $_POST['telefone']);
        $celular = mysqli_real_escape_string($con, $_POST['celular']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
        $query = "UPDATE empresa SET tel = '$tel', celular = '$celular', email = '$email', descricao = '$descricao'";
        $res = mysqli_query($con, $query);
        if($res == 1){
            echo '<p class="text-success container">Editado com sucesso!</p>';
            Header('Refresh:1');
        }else{
            echo '<p class="text-danger container">Erro ao editar. Contacte o suporte</p>';
        }
    }
?>