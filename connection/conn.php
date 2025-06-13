<?php
function conectar_bd()
{
    $host = "localhost";
    $port = "3307";
    $banco = "purrsue";
    $user = "root";
    $senha = "";

    $conn = mysqli_connect($host, $user, $senha, $banco, $port);

    if (!$conn) {
        die("Erro de conexão: " . mysqli_error($conn));
    }

    return $conn;
}