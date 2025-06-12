<?php
if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
    $ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "$ROOT/err/mandarProIndex.php";

    $codigo = Status::NAO_AUTORIZADO;
    bicuda($codigo);
}