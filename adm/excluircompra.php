<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $id_venda = $_GET['id'];
    $query = "SELECT nome, modelo, marca FROM usuvendeveic WHERE id_venda = '$id_venda'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    $excluirimg = "SELECT arquivo FROM imagens_venda WHERE id_venda = '$id_venda'";
    $res3 = mysqli_query($con, $excluirimg);
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
        <title>Excluir pedido</title>
    </head>
    <body>
        <form class="container" action="" method="POST">
            <div class="text-center">
                <h2>Tem certeza que deseja excluir solicitação de avaliação?</h2>
                <div class="container">
                    <label>Nome:</label> <b><?php echo $row['nome']; ?></b>
                    <label>Modelo do carro:</label> <b><?php echo $row['modelo']; ?></b>
                </div>
                <input type="hidden" value="<?php echo $id_venda; ?>" name="id"/>
                <button type="submit" class="btn btn-success">Sim</button>
                <a href="compra.php"><button type="button" class="btn btn-danger">Não</button></a>
            </div>
        </form>
    </body>
</html>
<?php
    if(!empty($_POST)){
        $venda = $_POST['id'];
        $query = "DELETE FROM usuvendeveic WHERE id_venda = '$venda'";
        $res2 = mysqli_query($con, $query);
        while($img = mysqli_fetch_array($res3)){
            $diretorio = "../compra/";
            unlink($diretorio.$img['arquivo']);
        }
        if($res2 && $res3 == 1){
            header('Location: compra.php');
        }
    }
?>