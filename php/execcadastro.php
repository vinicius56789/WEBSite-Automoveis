<?php 
    include_once('verifica_login.php');
    include_once('conexao.php');
    if(!empty($_POST)){
        $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
        $marca = mysqli_real_escape_string($con, $_POST['marca']);
        $km = mysqli_real_escape_string($con, $_POST['km']);
        $cor = mysqli_real_escape_string($con, $_POST['cor']);
        $combustivel = mysqli_real_escape_string($con, $_POST['combustivel']);
        $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
        $ano_fab = mysqli_real_escape_string($con, $_POST['ano_fab']);
        $ano_modelo = mysqli_real_escape_string($con, $_POST['ano_modelo']);
        $preco = str_replace(['.',','],['','.'],$_POST['valor']);
        $valor = mysqli_real_escape_string($con, $preco);
        $motor = mysqli_real_escape_string($con, $_POST['motor']);
        $query = "INSERT INTO carro VALUES (default,'$modelo','$marca','$km','$cor', '$combustivel', '$descricao','$ano_fab','$ano_modelo', '$valor', '$motor')";
        $res = mysqli_query($con, $query);
        $select = "SELECT id_carro from carro order by id_carro desc limit 1";
        $res2 = mysqli_query($con, $select);
        while($row = mysqli_fetch_array($res2, MYSQLI_BOTH)){
            $id_carro = $row['id_carro'];
        }
        if(!empty($_POST['ops'])){
            $opcionais = $_POST["ops"];
            foreach($opcionais as $op){
                $id_opcional = $op;
                $insert = "INSERT INTO possui_opcionais VALUES (default,'$id_carro','$id_opcional')";
                $res3 = mysqli_query($con, $insert);
            }
        }
        if(!empty($_POST['imagens'])){
            $fotos = $_FILES['fotos'];
            for($controle = 0; $controle < count($fotos['name']); $controle++){
                $extensao = ".jpg";
                $novo_nome = md5(time()) . rand(0,99999999) . $extensao;
                $diretorio = "../carros/";
                move_uploaded_file($fotos['tmp_name'][$controle], $diretorio.$novo_nome);
                $salvarimagem = "INSERT INTO imagens_carro VALUES (default, '$novo_nome', '$id_carro')";
                $res4 = mysqli_query($con, $salvarimagem);
            }
        }
    }else{
        echo "ERRO! REVISE SEU SITE";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro efetuado!</title>
    </head>
    <body>
        <?php if($res && $res2 == true){
                echo "CADASTRADO COM SUCESSO!";
            }else{
                echo "ERRO AO CADASTRAR";
                echo $id_carro;
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