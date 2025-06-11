<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";

/**
 * Te chuta de volta pra home. Ai! Ai!
 */
function bicuda($codigo)
{
    header("location:/pages/index.php?code=$codigo");
    die(); // Nesta casa, só usamos die()
}

// Acesso indevido à página
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $codigo = Status::METODO_INVALIDO->value;
    bicuda($codigo);
}

// Formulário em branco
if (in_array(null, [$_POST['usuario'], $_POST['senha']])) {
    $codigo = Status::FORM_EM_BRANCO->value;
    bicuda($codigo);
}