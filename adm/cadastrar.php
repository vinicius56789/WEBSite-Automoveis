<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');

    $query = "SELECT * FROM opcionais ORDER BY NOME ASC";
    $res = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../script/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="../script/bootstrap.js"></script>
        <title>Cadastro de Carro</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1>Cadastre um novo carro</h1>
            <form action="../php/execcadastro.php" method="POST" enctype="multipart/form-data">
                <input type="text" id="modelo" name="modelo" class="form-control mb-2" placeholder="Nome do carro" required/>
                <input type="text" id="marca" name="marca" class="form-control mb-2" placeholder="Marca do carro" required/>
                <input type="text" id="km" name="km" class="form-control mb-2 km" placeholder="Quilometragem do carro" required/>
                <input type="text" id="cor" name="cor" class="form-control mb-2" placeholder="Cor do carro" required/>
                <input type="text" name="combustivel" class="form-control mb-2" id="combustivel" placeholder="Combustível ex: Flex" required>
                <input type="text" id="ano_fab" name="ano_fab" class="form-control mb-2" placeholder="Ano de fabricação" required/>
                <input type="text" id="ano_modelo" name="ano_modelo" class="form-control mb-2" placeholder="Ano do modelo" required/>
                <input type="text" id="valor" name="valor" class="form-control mb-2 valor" placeholder="Preço ex: 50.000,00 (50 mil)"/>
                <input type="text" id="motor" name="motor" class="form-control mb-2" placeholder="Motor do carro"/>
                <textarea class="form-control mb-2" rows="10" maxlength="500" placeholder="Descrição sobre o carro" id="descricao" name="descricao"></textarea>
                <h6>Opcionais</h6>
                <div class="row">
                <?php
                    while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                ?>
                    <div class="col-md-3">
                        <input type="checkbox" name="ops[]" value="<?php echo $row['id_opcional']; ?>" id="<?php echo $row['id_opcional']; ?>"/>
                        <label for="<?php echo $row['id_opcional']; ?>" class="grey-text font-weight-light"><?php echo $row['nome']; ?></label>
                    </div>
                <?php
                    }
                ?>
                </div>
                    <label for="imagens">Quer cadastrar imagens?</label>
                    <input type="checkbox" name="imagens" id="imagens" checked><label>Sim</label>
                    <input type="file" name="fotos[]" class="form-control-file mb-2" multiple id="fotos">
                <input type="submit" value="Cadastrar"/>
            </form>
            <a href="cadastro.php">Voltar</a>
        </div>
        <script src="../script/mask.js"></script>
    </body>
</html>