<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
    $id_venda = $_GET['id'];
    $query = "SELECT * FROM usuvendeveic WHERE id_venda = '$id_venda'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    $imagens = "SELECT arquivo FROM imagens_venda WHERE id_venda = '$id_venda'";
    $res2 = mysqli_query($con, $imagens);
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
        <title>Dados de veículo</title>
        <style>
            img {
                height: 400px;
                width: 400px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="mb-4">Detalhes completos sobre veículo oferecido para compra</h2>
            <div class="text-center">
                <h3>Informações pessoais e de contato</h3>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label><b>Nome:</b> <?php echo $row['nome']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Telefone:</b> <?php echo $row['tel']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Celular:</b> <?php echo $row['celular']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>E-mail:</b> <?php echo $row['email']; ?></label>
                    </div>
                </div>
                <h3>Informações do carro</h3>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label><b>Modelo:</b> <?php echo $row['modelo']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Marca:</b> <?php echo $row['marca']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>km:</b> <?php echo $row['km']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Cor:</b> <?php echo $row['cor']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Combustível:</b> <?php echo $row['combustivel']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Ano de fabricação:</b> <?php echo $row['ano_fab']; ?></label>
                    </div>
                    <div class="col-md-3">
                        <label><b>Ano do modelo:</b> <?php echo $row['ano_modelo']; ?></label>
                    </div>
                </div>
                <h3>Possíveis informações adicionais</h3>
                <div class="row">
                    <div class="col-12">
                        <p><?php 
                                if($row['descricao'] !== null){
                                    echo $row['descricao'];
                                }else{
                                    echo "SEM COMENTÁRIOS ADICIONAIS";
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <h3>Imagens do veículo</h3>
                <div class="row">
                    <?php while($imagem = mysqli_fetch_array($res2)){ ?>
                        <div class="col-md-6">
                            <img class="mb-2" src="../compra/<?php echo $imagem['arquivo'];?>"/>
                        </div>
                    <?php } ?>
                </div>
                <a href="excluircompra.php?id=<?php echo $id_venda;?>"><button type="button" class="btn btn-danger">Excluir</button></a>
            </div>
        <a href="compra.php">Voltar</a>
        </div>
    </body>
</html>