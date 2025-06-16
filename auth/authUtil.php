<?php
function impedirAcessoIndevido($redirecionarPara = "/pages/index.php")
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $codigo = Status::METODO_INVALIDO;
        bicuda($codigo, $redirecionarPara);
    }
}

function impedirFormularioEmBranco($redirecionarPara = "/pages/index.php")
{
    if (in_array(null, $_POST)) {
        $codigo = Status::FORM_EM_BRANCO;
        bicuda($codigo, $redirecionarPara);
    }
}

function isLogado() {
    return isset($_SESSION['usuario']) && isset($_SESSION['senha']);
}