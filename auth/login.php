<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";

/**
 * Manda de volta pra home
 */
function bicuda($codigo)
{
    header("location:/pages/index.php?code=$codigo");
}

// Acesso indevido à página
if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    $codigo = Status::METODO_INVALIDO->value;
    bicuda($codigo);
}

// Formulário em branco
if (in_array(null, [$_POST['usuario'], $_POST['senha']])) {
    $codigo = Status::FORM_EM_BRANCO->value;
    bicuda($codigo);
}