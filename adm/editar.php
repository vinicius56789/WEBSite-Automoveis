<?php 
    include_once('../php/conexao.php');
    include_once('../php/verifica_login.php');
    $id_carro = $_GET['id'];
    $query = "SELECT * FROM carro WHERE id_carro = '$id_carro'";
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
        <title>Editar Carro</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1>Edite</h1>
            <form action="../php/execeditar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_carro" class="form-control mb-2" value="<?php echo $id_carro; ?>"/>
                <label for="modelo">Nome do Carro:</label>
                <input type="text" id="modelo" name="modelo" class="form-control mb-2" value="<?php echo $row['modelo']; ?>" required/>
                <label for="marca">Marca do Carro:</label>
                <input type="text" id="marca" name="marca" class="form-control mb-2" value="<?php echo $row['marca']; ?>" required/>
                <label for="km">Quilometragem do Carro:</label>
                <input type="text" id="km" name="km" class="form-control mb-2" value="<?php echo $row['km']; ?>" required/>
                <label for="cor">Cor do Carro:</label>
                <input type="text" id="cor" name="cor" class="form-control mb-2" value="<?php echo $row['cor']; ?>" required/>
                <label>Combustível do carro:</label>
                <input type="text" name="combustivel" class="form-control mb-2" id="combustivel" value="<?php echo $row['combustivel']; ?>" required/>
                <label for="ano_fab">Ano de fabricação do Carro:</label>
                <input type="text" id="ano_fab" name="ano_fab" class="form-control mb-2" value="<?php echo $row['ano_fab']; ?>" required/>
                <label for="ano_modelo">Ano do modelo do Carro:</label>
                <input type="text" id="ano_modelo" name="ano_modelo" class="form-control mb-2" value="<?php echo $row['ano_modelo']; ?>" required/>
                <label for="valor">Preço do Carro</label>
                <input type="text" id="valor" name="valor" class="form-control mb-2" value="<?php echo $row['valor']; ?>"/>
                <label for="motor">Motor do Carro</label>
                <input type="text" id="motor" name="motor" class="form-control mb-2" value="<?php echo $row['motor']; ?>"/>
                <label for="descricao">Descrição do Carro:</label>
                <textarea class="form-control mb-2" rows="10" id="descricao" name="descricao"><?php echo $row['descricao']; ?></textarea>
                <input type="submit" value="Editar"/>
            </form>
            <a href="cadastro.php">Voltar</a>
        </div>
    </body>
</html>