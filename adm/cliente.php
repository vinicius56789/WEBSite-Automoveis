<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $id_cliente = $_GET['id'];
    $query = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
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
        <title>Cliente</title>
    </head>
    <body class="bg-dark">
        <div class="text-center text-light">
            <h2 class="mb-4">Informações do Cliente</h2>
            <h3>Informações pessoais</h3>
        </div>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Endereço</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Nascimento</th>
                        <th>Sexo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['cpf']; ?></td>
                        <td><?php echo $row['rg']; ?></td>
                        <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['uf']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['nascimento']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                    </tr>
                </tbody>
            </table>
            <h3 class="text-center text-light">Informações de contato</h3>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['celular']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                </tbody>
            </table>
            <h3 class="text-center text-light">Informações profissionais</h3>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Profissão</th>
                        <th>Salário Bruto</th>
                        <th>Salário Líquido</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['profissao']; ?></td>
                        <td>R$ <?php $bruto = $row['salario_brut_mensal']; echo $bruto; ?></td>
                        <td>R$ <?php $liquido = $row['salario_liq_mensal']; echo $liquido; ?></td>
                    </tr>
                </tbody>
            </table>
            <a class="container text-light" href="pessoas.php">Voltar</a>
        </div>
    </body>
</html>