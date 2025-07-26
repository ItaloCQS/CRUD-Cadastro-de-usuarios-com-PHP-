<?php
    session_start();
    require("conexao.php");

    if(isset($_POST['register-client-btn'])){
        $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $data_nascimento = mysqli_real_escape_string($conn, trim($_POST['data_nascimento']));
        $senha = mysqli_real_escape_string($conn, PASSWORD_HASH(trim($_POST['senha']), PASSWORD_DEFAULT));
    

        $sql = "INSERT INTO usuario (nome, email, data_nascimento, senha) VALUES ('$nome','$email', '$data_nascimento', '$senha')";

        if(mysqli_query($conn, $sql)){
            $_SESSION['mensagem'] = "Usuário Cadastrado";
            $_SESSION['bg'] = "success";
            header("location: index.php");
            exit;
        } else{
            $_SESSION['mensagem'] = "Usuário não Cadastrado";
            $_SESSION['bg'] = "danger";
            header("location: index.php");
            exit;
        };
    };

    if(isset($_POST['edit-client-btn'])){
        $id = mysqli_real_escape_string($conn, trim($_POST['id']));
        $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $data_nascimento = mysqli_real_escape_string($conn, trim($_POST['data_nascimento']));
        $senha = trim($_POST['senha']);

        if (!empty($senha)) {
            $senhaHash = mysqli_real_escape_string($conn, password_hash($senha, PASSWORD_DEFAULT));
            $sql = "UPDATE usuario SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento', senha = '$senhaHash' WHERE id = '$id'";
        } else { 
            $sql = "UPDATE usuario SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento' WHERE id = '$id'";
        }

        if(mysqli_query($conn, $sql)){
            $_SESSION['mensagem'] = "O Usuário foi Editado com Sucesso";
            $_SESSION['bg'] = "success";
            header("location: index.php");
            exit;
        } else{
            $_SESSION['mensagem'] = "Usuário não foi Editado";
            $_SESSION['bg'] = "danger";
            header("location: index.php");
            exit;
        };
    };

    if(isset($_POST['delete-client-btn'])){
        $id = mysqli_real_escape_string($conn, trim($_POST['delete-client-btn']));

        $sql = "DELETE FROM usuario WHERE id = '$id'";

        mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0){
            $_SESSION['mensagem'] = "Usuário Deletado";
            $_SESSION['bg'] = "success";
            header("location: index.php");
            exit;
        } else{
            $_SESSION['mensagem'] = "Ocorreu um erro";
            $_SESSION['bg'] = "danger";
            header("location: index.php");
            exit;
        };
    };



?>