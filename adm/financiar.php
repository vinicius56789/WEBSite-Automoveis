<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $id_pessoa = $_GET['id'];
    $query = "SELECT * FROM bem_financiar JOIN dados_pessoais ON bem_financiar.id_pessoa = dados_pessoais.id_pessoa 
    WHERE dados_pessoais.id_pessoa = '$id_pessoa'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    $id_carro = $row['id_carro'];
    $carro = "SELECT i.arquivo, c.modelo, c.marca, c.cor, c.km, c.ano_fab, c.ano_modelo, c.valor FROM carro as c JOIN imagens_carro as i 
    ON c.id_carro = i.id_carro WHERE c.id_carro = '$id_carro'";
    $res2 = mysqli_query($con, $carro);
    $array = mysqli_fetch_array($res2);
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
        <title>Financiamento</title>
        <style>
            img{
                width: 350px;
                height: 300px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">Detalhes sobre requerimento de financiamento</h2>
            <div class="text-center">
                <h3>Informações pessoais</h3>
                <div class="row mb-4">
                    <div class="col-md-3 mb-1">
                        <label><b>Nome:</b> <?php echo $row['nome']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>CPF:</b> <?php echo $row['cpf']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>RG:</b> <?php echo $row['rg']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Endereço:</b> <?php echo $row['endereco']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>UF:</b> <?php echo $row['uf']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Cidade:</b> <?php echo $row['cidade']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>CEP:</b> <?php echo $row['cep']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Bairro:</b> <?php echo $row['bairro']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Tempo na atual residência:</b> <?php echo $row['tempo_reside']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Tipo de residência:</b> <?php echo $row['tipo_reside']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Data de nascimento:</b> <?php echo $row['nascimento']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Sexo:</b> <?php echo $row['sexo']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Estado civil:</b> <?php echo $row['e_civil']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>N° de dependentes:</b> <?php echo $row['dependentes']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Nome do pai:</b> <?php echo $row['nome_pai']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Nome da mãe:</b> <?php echo $row['nome_mae']; ?></label>
                    </div>
                </div>
                <h3>Informações de contato</h3>
                <div class="row mb-4">
                    <div class="col-md-4 mb-1">
                        <label><b>Telefone:</b> <?php echo $row['tel']; ?></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label><b>Celular:</b> <?php echo $row['celular']; ?></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label><b>E-mail:</b> <?php echo $row['email']; ?></label>
                    </div>
                </div>
                <h3>Informações profissionais</h3>
                <div class="row mb-4">
                    <div class="col-md-3 mb-1">
                        <label><b>Profissão:</b> <?php echo $row['profissao']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Salário bruto:</b> R$<?php echo $row['salario_brut_mensal']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Salário Líquido:</b> R$<?php echo $row['salario_liq_mensal']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Admissão na empresa:</b> <?php echo $row['admissao_empresa']; ?></label>
                    </div>
                </div>
                <h3>Informações sobre o carro a financiar</h3>
                <div class="row mb-4">
                    <div class="col-md-4 mb-1">
                        <img src="../carros/<?php echo $array['arquivo']; ?>"/>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Modelo:</b> <?php echo $array['modelo']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Marca:</b> <?php echo $array['marca']; ?></label>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label><b>Cor:</b> <?php echo $array['cor']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>KM:</b> <?php echo $array['km']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Ano fabricação:</b> <?php echo $array['ano_fab']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Ano modelo:</b> <?php echo $array['ano_modelo']; ?></label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <label><b>Valor do carro:</b> R$<?php $valor = number_format($array['valor'], 2, ',','.'); echo $valor; ?></label>
                    </div>
                </div>
                <h3>Como o cliente quer pagar</h3>
                <div class="row mb-4">
                    <div class="col-md-4 mb-1">
                        <label><b>Pagamento à vista:</b> R$<?php echo $row['pago_vista']; ?></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label>Financiamento: R$<?php echo $row['financiar']; ?></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label>Ideia de N° prestações do cliente: <?php echo $row['prestacoes']; ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <b>Comentários extras:</b>
                    </div>
                    <div class="col-md-12">
                        <p class="text-justify"><?php echo $row['comentario']; ?></p>
                    </div>
                    <a href="excluirsolicitacao.php?id=<?php echo $id_pessoa; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                </div>
            </div>
            <a href="solicitacao.php">Voltar</a>
        </div>
    </body>
</html>