<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $query = "SELECT id_venda, nome, marca, modelo, km FROM usuvendeveic";
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
        <title>Carros para compra</title>
        <style>
            img{
                width: 150px;
                height: 100px;
            }
        </style>
    </head>
    <body class="bg-dark">
        <h3 class="text-light ml-2 mt-2">Carros para avaliação de valor</h3>
        <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Km</th>
                        <th>Imagem</th>
                        <th>Detalhes</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
        <?php while($row = mysqli_fetch_array($res)){ 
                $id_venda = $row['id_venda'];
                $imagem = "SELECT arquivo FROM imagens_venda WHERE id_venda = '$id_venda' LIMIT 1";
                $res2 = mysqli_query($con, $imagem);
                $imagens = mysqli_fetch_array($res2);
        ?>
                    <tr>
                        <td><p class="mt-4"><?php echo $row['nome']; ?></p></td>
                        <td><p class="mt-4"><?php echo $row['marca']; ?></p></td>
                        <td><p class="mt-4"><?php echo $row['modelo']; ?></p></td>
                        <td><p class="mt-4"><?php echo $row['km']; ?></p></td>
                        <td><img src="../compra/<?php echo $imagens['arquivo']; ?>"/></td>
                        <td><a href="comprar.php?id=<?php echo $id_venda; ?>"><button type="button" class="btn btn-primary mt-3">Ver detalhes</button></a></td>
                        <td><a href="excluircompra.php?id=<?php echo $id_venda; ?>"><button type="button" class="btn btn-danger mt-3">Excluir</button></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <a class="container text-light" href="admin.php">Voltar</a>
    </body>
</html>