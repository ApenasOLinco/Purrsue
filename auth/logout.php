<?php 
$ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once "$ROOT/err/redirecionar.php";
require_once "$ROOT/err/status.php";

session_start();
unset($_SESSION);
session_destroy();
$codigo = Status::LOGOUT;
bicuda($codigo);