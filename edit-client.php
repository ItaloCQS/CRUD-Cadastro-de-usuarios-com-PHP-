<?php
    session_start();
    require("conexao.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <?php
    include("navbar.php")
  ?>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar
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
                        $sqlfoto = "SELECT file_name FROM files WHERE usuario = '$usuario_id'";
                        $querys = mysqli_query($conn, $sqlfoto);
                        $foto = null;
                        if($querys && mysqli_num_rows($querys) > 0){
                            $foto = mysqli_fetch_assoc($querys);
                        }
                    ?>
                    <form action="process-client.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control border border-success-subtle" value="<?= $usuario['id'] ?>">
                        <div class="mb-3">
                            <label class="fw-bold">Nome</label>
                            <input type="text" name="nome" class="form-control border border-success-subtle" value="<?= $usuario['nome'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">E-mail</label>
                            <input type="email" name="email" class="form-control border border-success-subtle" value="<?= $usuario['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Data de Nascimento</label>
                            <input type="date" name="data_nascimento" class="form-control border border-success-subtle" value="<?= $usuario['data_nascimento'] ?>">
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Nova Foto</label>
                            <input type="file" name="foto" class="form-control border border-success-subtle">
                        </div>
                        <div class="card mx-auto" style="width: 18rem;">
                            <?php if ($foto && !empty($foto['file_name'])): ?>
                            <img src="arquivos/<?= $foto['file_name'] ?>" class="card-img-top">
                            <?php else: ?>
                                <img src="arquivos/image.gif" class="card-img-top border border-success-subtle">
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Senha</label>
                            <input type="password" name="senha" class="form-control border border-success-subtle" placeholder="**********">
                        </div>
                        <button type="submit" name="edit-client-btn" class="btn btn-primary">Salvar Alteração</button>
                    </form>
                        <?php endforeach; ?>
                        <?php
                            } else {echo("Usuário não encontrado");}
                        ?>
                        <?php
                            } else {echo("Usuário não encontrado");}
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>