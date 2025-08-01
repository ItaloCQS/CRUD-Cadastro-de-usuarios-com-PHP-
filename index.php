<?php
    session_start();
    require("conexao.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Clientes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <?php
    include("navbar.php")
  ?>
  <body>
    <div class="container mt-5">
        <?php
            include("mensagem.php")
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuários
                            <a href="register-client.php" class="btn btn-primary float-end">Cadastrar Usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM usuario";
                                    $query = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($query) > 0){
                                        foreach($query as $usuario):
                                ?>
                                <tr>
                                    <th scope="row"><?=$usuario['id']?></th>
                                    <td><?= $usuario['nome'] ?></td>
                                    <td><?= $usuario['email'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                                    <td> 
                                        <a href="client-view.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="edit-client.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="process-client.php" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário? Esta ação não poderá ser desfeita.');">
                                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                            <button type="submit" name="delete-client-btn" class="btn btn-sm btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php
                                } else { echo ("Ocorreu um erro na visualização dos Usuários");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>