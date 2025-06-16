<?php
session_start();

require_once "$ROOT/auth/authUtil.php";

if(!isLogado()) {
    require_once "$ROOT/err/redirecionar.php";
    require_once "$ROOT/err/status.php";
    
    $codigo = Status::NAO_AUTORIZADO;
    bicuda($codigo);
}