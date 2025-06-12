<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";
require_once "$ROOT/err/mandarProIndex.php";
require_once "authUtil.php";

impedirAcessoIndevido();
impedirFormularioEmBranco();

// Obtém os dados do corpo da requisição
[$usuario, $senha] = [$_POST['usuario'], $_POST['senha']];

// Preparação da consulta
require_once "$ROOT/connection/conn.php";

$conn = conectar_bd();
$query = 'SELECT * FROM _usuarios WHERE usuario = ? AND senha = ?';
$stmt = mysqli_prepare($conn, $query);

// Erro ao preparar a consulta
if (!$stmt) {
    mysqli_close($conn);
    $codigo = Status::ERRO_NA_CONSULTA;
    bicuda($codigo);
}

mysqli_stmt_bind_param($stmt, 'ss', $usuario, $senha);

// Execução da consulta
if (!mysqli_execute($stmt)) {
    mysqli_close($conn);
    $codigo = Status::ERRO_NA_CONSULTA;
    bicuda($codigo);
}

// Consultar quantas colunas existem no resultado
mysqli_stmt_store_result($stmt);
$linhas = mysqli_stmt_num_rows($stmt);

// Usuário ou senha incorretos
if ($linhas <= 0) {
    $codigo = Status::CREDENCIAIS_INVALIDAS;
    bicuda($codigo);
}

// Obter os resultados
mysqli_stmt_bind_result($stmt, $id, $usuario, $senha, $email);
mysqli_stmt_fetch($stmt);

// Fechar a conexão
mysqli_close($conn);

// O usuário entrou!!! Yay!!!
session_start();
$_SESSION['id'] = $id;
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
$_SESSION['email'] = $email;

// Redirecionar pra Home
header('location:/pages/home.php');