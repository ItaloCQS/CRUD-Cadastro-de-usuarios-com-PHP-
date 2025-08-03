<?php
    session_start();
    require("conexao.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
  <?php
    include("navbar.php")
  ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Usuário
                            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $id = mysqli_real_escape_string($conn, $_GET['id']);
                                $sql = "SELECT * FROM usuario WHERE id = '$id'";
                                $query = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($query) > 0){
                                    foreach($query as $usuario):
                        ?>

                        <?php
                            $usuario_id = $usuario['id'];
                            $sqlFoto = "SELECT file_name FROM files WHERE usuario = '$usuario_id' ORDER BY id DESC LIMIT 1";
                            $queryFoto = mysqli_query($conn, $sqlFoto);

                            $foto = null;
                            if ($queryFoto && mysqli_num_rows($queryFoto) > 0) {
                                $foto = mysqli_fetch_assoc($queryFoto);
                            }
                        ?>

                        <div class="input-group mb-3">
                            <p class="input-group-text fw-bold">Nome</p>
                            <p class="form-control"><?= $usuario['nome'] ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <p class="input-group-text fw-bold">E-mail</p>
                            <p class="form-control"><?= $usuario['email'] ?></p>
                        </div>
                        <div class="input-group">
                            <p class="input-group-text fw-bold">Data de Nascimento</p>
                            <p class="form-control"><?= date("d/m/Y",strtotime(($usuario['data_nascimento']))) ?></p>
                        </div>

                        <div class="card mx-auto" style="width: 18rem;">
                            <?php if ($foto && !empty($foto['file_name'])): ?>
                                <img src="arquivos/<?= $foto['file_name'] ?>" class="card-img-top">
                            <?php else: ?>
                                <img src="arquivos/image.gif" class="card-img-top">
                            <?php endif; ?>
                        </div>

                        <?php endforeach;?>
                        <?php
                            } else {echo("Usuário não encontrado");}
                        ?>
                        <?php
                            } else {echo("Erro");}
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>