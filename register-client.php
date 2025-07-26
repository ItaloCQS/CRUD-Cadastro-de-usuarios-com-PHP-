<?php
    session_start();
    require("conexao.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Usuário</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cadastro de Usuário
                            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="process-client.php" method="POST">
                            <div class="mb-3">
                                <label class="fw-bold">Nome</label>
                                <input type="text" name="nome" class="form-control border border-success-subtle" placeholder="joão da silva">
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">E-mail</label>
                                <input type="email" name="email" class="form-control border border-success-subtle" placeholder="exemplo@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control border border-success-subtle">
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold">Senha</label>
                                <input type="password" name="senha" class="form-control border border-success-subtle" placeholder="**********">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="register-client-btn" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>