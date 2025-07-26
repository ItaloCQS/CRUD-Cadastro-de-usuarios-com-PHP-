<?php
    $HOST = "";
    $USER = "";
    $PASSWORD = "";
    $DB = "";

    $conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

    if (!$conn) {
        // Você pode logar o erro em um arquivo (opcional)
        error_log("Erro de conexão: " . mysqli_connect_error());
    
        // Mostra uma mensagem segura ao usuário
        die("Erro ao conectar ao banco de dados. Tente novamente mais tarde.");
    }


?>