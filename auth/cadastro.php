<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";
require_once "$ROOT/err/redirecionar.php";
require_once "authUtil.php";

impedirAcessoIndevido();
impedirFormularioEmBranco();

// Obter os dados do corpo da requisição
[$usuario, $senha, $email] = [$_POST['usuario'], $_POST['senha'], $_POST['email']];

// Conectar ao banco de dados
require_once "$ROOT/connection/conn.php";
$conn = conectar_bd();

//
// Verificar se o nome de usuário já existe no banco de dados
//
$query = "SELECT usuario FROM _usuarios WHERE usuario = ? LIMIT 1";
$resultado = mysqli_execute_query($conn, $query, [$usuario])->fetch_all();

// Usuário já existe
if (!empty($resultado)) {
    mysqli_close($conn);
    $codigo = Status::USUARIO_EXISTENTE;
    bicuda($codigo);
}

//
// Verificar se o email já existe no banco de dados
//
$query = "SELECT email FROM _usuarios WHERE email = ? LIMIT 1";
$resultado = mysqli_execute_query($conn, $query, [$email])->fetch_all();

// Email já existe
if(!empty($resultado)) {
    mysqli_close($conn);
    $codigo = Status::EMAIL_EXISTENTE;
    bicuda($codigo);
}

//
// Fazer o insert
//
$query = "INSERT INTO _usuarios (usuario, senha, email) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    mysqli_close($conn);
    $codigo = Status::ERRO_NA_CONSULTA;
    bicuda($codigo);
}

mysqli_stmt_bind_param($stmt, "sss", $usuario, $senha, $email);

if (!mysqli_execute($stmt)) {
    mysqli_close($conn);
    $codigo = Status::ERRO_NA_INSERCAO;
    bicuda($codigo);
}

$linhas_afetadas = mysqli_affected_rows($conn);

if ($linhas_afetadas <= 0) {
    mysqli_close($conn);
    $codigo = Status::ERRO_NA_INSERCAO;
    bicuda($codigo);
}

// Redirecionamento pro index com mensagem de sucesso
$codigo = Status::CADASTRO_SUCESSO;
bicuda($codigo);