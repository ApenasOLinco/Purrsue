<?php
function impedirAcessoIndevido()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $codigo = Status::METODO_INVALIDO;
        bicuda($codigo);
    }
}

function impedirFormularioEmBranco()
{
    if (in_array(null, $_POST)) {
        $codigo = Status::FORM_EM_BRANCO;
        bicuda($codigo);
    }
}

function isLogado() {
    return isset($_SESSION['usuario']) && isset($_SESSION['senha']);
}