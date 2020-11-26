<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');
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
        <title>Admin</title>
    </head>
    <body>
        <div class="container">
            <div class="album py-5 bg-light">
                <h2>Bem vindo ao painel de administrador</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver os carros cadastrados ou cadastrar mais?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="cadastro.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">1</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer cadastrar mais opcionais para seus carros?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="opcional.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">2</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver os carros oferecidos para compra?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="compra.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">3</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver as solitações de orçamento?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="solicitacao.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">4</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver os clientes que entraram em contato?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="pessoas.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">5</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer editar as informações da sua empresa?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="minhaempresa.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">6</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer excluir todos os dados pessoais?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="admin.php?id=0"><button type="button" class="btn btn-sm btn-danger">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">7</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="../php/logout.php" class="container">Logout</a>
        </div>
    </body>
</html>
<?php
    if(!empty($_GET['id'])){
        if($_GET['id'] == 0){
            $query = "DELETE FROM dados_pessoais WHERE id_pessoa > 0";
            $res = mysqli_query($con, $query);
            if($res == 1){
                echo "<p class='container text-danger'>TODOS OS DADOS FORAM EXCLUIDOS!</p>";
            }else{
                echo "<p class='container text-danger'>ERRO. CONTACTE O SUPORTE</p>";
            }
        }
    }
?>