<?php 
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $query = "SELECT * FROM cliente";
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
        <title>Lista de clientes</title>
    </head>
    <body class="bg-dark">
        <h3 class="text-light ml-2 mt-2">Lista de possíveis clientes</h3>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Profissão</th>
                    <th>Sexo</th>
                    <th>Ver detalhes</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td><p class="mt-4"><?php echo $row['nome']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['email']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['profissao']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['sexo']; ?></p></td>
                    <td><a href="cliente.php?id=<?php echo $row['id_cliente']; ?>"><button type="button" class="btn btn-primary mt-3">Detalhes</button></a></td>
                    <td><a href="excluircliente.php?id=<?php echo $row['id_cliente']; ?>"><button type="button" class="btn btn-danger mt-3">Excluir</button></a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a class="container text-light" href="admin.php">Voltar</a>
    </body>
</html>