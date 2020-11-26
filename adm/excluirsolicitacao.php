<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $id_pessoa = $_GET['id'];
    $query = "SELECT b.id_pessoa, d.nome, c.modelo FROM bem_financiar as b JOIN dados_pessoais as d ON b.id_pessoa = d.id_pessoa 
    JOIN carro as c ON c.id_carro = b.id_carro WHERE b.id_pessoa = '$id_pessoa'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
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
        <title>Excluir solicitação</title>
    </head>
    <body>
        <form class="container" action="" method="POST">
            <div class="text-center">
                <h2>Você tem certeza que deseja excluir essa solicitação?</h2>
                <div class="container">
                    <label>Solicitação de financiamento de:</label> <b><?php echo $row['nome']; ?></b>
                    <label>Interesse no carro:</label> <b><?php echo $row['modelo']; ?></b>
                </div>
                <input type="hidden" value="<?php echo $id_pessoa; ?>" name="id"/>
                <button type="submit" class="btn btn-success">Sim</button>
                <a href="solicitacao.php"><button type="button" class="btn btn-danger">Não</button></a>
            </div>
        </form>
    </body>
</html>
<?php
    if(!empty($_POST)){
        $pessoa = $_POST['id'];
        $excluir = "DELETE FROM dados_pessoais WHERE id_pessoa = '$pessoa'";
        $res = mysqli_query($con, $excluir);
        if($res == 1){
            Header('Location: solicitacao.php');
        }else{
            echo "ERRO AO EXCLUIR. CONTACTE O SUPORTE";
        }
    }
?>