<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $query = "SELECT b.pago_vista, b.financiar, b.prestacoes ,d.nome, d.id_pessoa ,c.modelo, c.cor FROM bem_financiar as b JOIN dados_pessoais as d 
    ON b.id_pessoa = d.id_pessoa JOIN carro as c ON b.id_carro = c.id_carro";
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
        <title>Solicitações</title>
    </head>
    <body class="bg-dark">
        <h3 class="text-light ml-2 mt-2">Solicitações de orçamento</h3>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Pagar à vista</th>
                    <th>Financiamento</th>
                    <th>Número de prestações</th>
                    <th>Ver detalhes</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($res)) { ?>
                <tr>
                    <td><p class="mt-4"><?php echo $row['nome']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['modelo']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['cor']; ?></p></td>
                    <td><p class="mt-4">R$ <?php echo $row['pago_vista']; ?></p></td>
                    <td><p class="mt-4">R$ <?php echo $row['financiar']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['prestacoes']; ?></p></td>
                    <td><a href="financiar.php?id=<?php echo $row['id_pessoa']; ?>"><button type="button" class="btn btn-primary mt-3">Ver Detalhes</button></a></td>
                    <td><a href="excluirsolicitacao.php?id=<?php echo $row['id_pessoa']; ?>"><button type="button" class="btn btn-danger mt-3">Excluir</button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="container text-light" href="admin.php">Voltar</a>
    </body>
</html>