<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";

if($_SERVER['REQUEST_METHOD'] !== "POST") {
    $code = Status::METODO_INVALIDO->value;
    header("location:/pages/index.php?code=$code");
}