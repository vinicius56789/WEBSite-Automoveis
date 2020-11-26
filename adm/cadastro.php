<?php 
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');

    $query = "SELECT * FROM carro";
    $res = mysqli_query($con, $query);
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
        <title>Carros</title>
        <style>
            img{
                width: 150px;
                height: 100px;
            }
        </style>
    </head>
    <body class="bg-dark">
        <a href="cadastrar.php"><button type="button" class="btn btn-success ml-2 mt-2 mb-2">Cadastrar novo carro</button></a>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Cor</th>
                    <th>Km</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
        <?php 
            while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                $id_carro = $row['id_carro'];
                $requerimento = "SELECT arquivo FROM imagens_carro WHERE id_carro = $id_carro LIMIT 1";
                $requer = mysqli_query($con, $requerimento);
                $dado = $requer ->fetch_array();
        ?>
            <tr>
                <td>
                    <?php 
                        if(!empty($dado['arquivo'])){
                    ?>
                    <img src="../carros/<?php echo $dado['arquivo']; ?>"/>
                    <?php }else{ ?> <img src="../carros/sem-foto.jpg"/> <?php } ?>
                </td>
                <td><p class="mt-4"><?php echo $row['modelo']; ?></p></td>
                <td><p class="mt-4"><?php echo $row['marca']; ?></p></td>
                <td><p class="mt-4"><?php echo $row['cor']; ?></p></td>
                <td><p class="mt-4"><?php echo $row['km']; ?></p></td>
                <td><a href="editar.php?id=<?php echo $id_carro; ?>"><button type="button" class="btn btn-primary mt-3">Editar</button></a></td>
                <td><a href="excluircarro.php?id=<?php echo $id_carro; ?>"><button type="button" class="btn btn-danger mt-3">Excluir</button></a></a></td>
            </tr>
        <?php
            }
        ?>
        </table>
        <a class="container text-light" href="admin.php">Voltar</a>
    </body>
</html>