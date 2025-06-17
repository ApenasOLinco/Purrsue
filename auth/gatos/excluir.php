<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once "$ROOT/auth/cadeado.php";

require_once "$ROOT/err/redirecionar.php";
require_once "$ROOT/err/status.php";

$gato_id = $_GET['id'];

// Não foi provido um id nos parâmetros da URL
if(!$gato_id) {
    $codigo = Status::ERRO_NA_CONSULTA;
    bicuda($codigo);
}

$usuario_id = $_SESSION['id'];

// Verificar se o usuário dessa sessão é o usuário que cadastrou o gato.
require_once "$ROOT/connection/conn.php";
$conn       = conectar_bd();
$query      = "SELECT * FROM _gatos WHERE id = $gato_id";
$result     = mysqli_query($conn, $query);

// Id inválido
if (!$result) {
    $codigo = Status::ERRO_NA_CONSULTA;
    bicuda($codigo);
}

$gato = mysqli_fetch_assoc($result);

// O usuário não é dono do gato
if ($usuario_id != $gato['usuario_id']) {
    $codigo = Status::NAO_AUTORIZADO;
    bicuda($codigo);
}

// Excluir o gato
$query  = "DELETE FROM _gatos WHERE id = ?";
$stmt   = mysqli_prepare($conn, $query);

if (!$stmt) {
    $codigo = Status::ERRO_NA_EXCLUSAO;
    bicuda($codigo);
}

mysqli_stmt_bind_param($stmt, 'i', $gato_id);

if (!mysqli_stmt_execute($stmt)) {
    $codigo = Status::ERRO_NA_EXCLUSAO;
    bicuda($codigo);
}

if (mysqli_affected_rows($conn) < 1) {
    $codigo = Status::ERRO_NA_EXCLUSAO;
    bicuda($codigo);
}

mysqli_close($conn);

$codigo = Status::EXCLUSAO_SUCESSO;
bicuda($codigo);