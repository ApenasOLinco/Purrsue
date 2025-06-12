<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";
require_once "$ROOT/err/mandarProIndex.php";
require_once "authUtil.php";

impedirAcessoIndevido();
impedirFormularioEmBranco();

// Obtém os dados do corpo da requisição
[$usuario, $senha, $email] = [$_POST['usuario'], $_POST['senha'], $_POST['email']];

// Preparar o insert
require_once '/connection/conn.php';