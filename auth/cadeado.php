<?php
session_start();

if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
    require_once "$ROOT/err/mandarProIndex.php";
    require_once "$ROOT/err/status.php";
    
    $codigo = Status::NAO_AUTORIZADO;
    bicuda($codigo);
}