<?php 
    include_once('verifica_login.php');
    include_once('conexao.php');
    if(!empty($_POST)){
        $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
        $marca = mysqli_real_escape_string($con, $_POST['marca']) ;
        $km = mysqli_real_escape_string($con, $_POST['km']);
        $cor = mysqli_real_escape_string($con, $_POST['cor']);
        $combustivel = mysqli_real_escape_string($con, $_POST['combustivel']);
        $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
        $ano_fab = mysqli_real_escape_string($con, $_POST['ano_fab']);
        $ano_modelo = mysqli_real_escape_string($con, $_POST['ano_modelo']);
        $valor = mysqli_real_escape_string($con, $_POST['valor']);
        $motor = mysqli_real_escape_string($con, $_POST['motor']);
        $id_carro = $_POST['id_carro'];
        $query = "UPDATE carro SET modelo = '$modelo', marca = '$marca', km = '$km', cor = '$cor', combustivel = '$combustivel', 
                descricao = '$descricao', ano_fab = '$ano_fab', ano_modelo = '$ano_modelo', valor = '$valor', motor = '$motor' WHERE id_carro = '$id_carro'";
        $res = mysqli_query($con, $query);
    }else{
        echo "ERRO! REVISE SEU SITE";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edição efetuada!</title>
    </head>
    <body>
        <?php if($res == 1){
                echo "EDITADO COM SUCESSO!";
            }else{
                echo "ERRO AO CADASTRAR";
                echo $id_carro;
                echo $query;
                echo "<br>";
                echo "Entre em contato com o suporte";
            }
        ?>
        <a href="../adm/cadastro.php">ir para página de cadastrados</a>
        <a href="../adm/cadastrar.php">Cadastrar novo carro</a>
        <a href="../adm/admin.php">Voltar ao Painel de administrador</a>
        <a href="../index.php">Voltar à página inicial do site</a>
    </body>
</html>