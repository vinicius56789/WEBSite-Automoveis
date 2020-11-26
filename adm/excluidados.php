<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $query = "DELETE FROM dados_pessoais WHERE id_pessoa > 0";
    $res = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>