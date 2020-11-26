<?php 
    include_once('../php/conexao.php');
    include_once('../php/verifica_login.php');
    $id_carro = $_GET['id'];
    $query = "SELECT * FROM carro WHERE id_carro = $id_carro";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    $imagens = "SELECT arquivo FROM imagens_carro WHERE id_carro = '$id_carro'";
    $res3 = mysqli_query($con, $imagens);

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
        <title>Quer realmente excluir?</title>
    </head>
    <body>
        <form class="container" action="" method="POST">
            <div class="container text-center">
                <h2>Você tem certeza que deseja excluir <?php echo $row['modelo']; echo " "; echo $row['cor']; ?>?</h2>
                <input type="hidden" name="<?php echo $id_carro; ?>">
                <button type="submit" class="btn btn-success">Sim</button>
                <a href="cadastro.php"><button type="button" class="btn btn-danger">Não</button></a>
            </div>
        </form>
    </body>
</html>

<?php 
    if(!empty($_POST)){
        $delete = "DELETE FROM carro WHERE id_carro = '$id_carro'";
        $res2 = mysqli_query($con, $delete);
        while($row2 = mysqli_fetch_array($res3)){
            $diretorio = "../carros/";
            unlink($diretorio.$row2['arquivo']);
        }
        if($res2 == 1){
            header('Location: cadastro.php');
        }
    }
?>