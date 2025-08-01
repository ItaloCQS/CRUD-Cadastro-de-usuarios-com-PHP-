<?php
    $HOST = "";
    $USER = "";
    $PASSWORD = "";
    $DB = "";

    $conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

    if (!$conn) {
        error_log("Erro de conexão: " . mysqli_connect_error());
    
        die("Erro ao conectar ao banco de dados. Tente novamente mais tarde.");
    }


?>