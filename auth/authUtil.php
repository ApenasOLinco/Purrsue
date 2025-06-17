<?php
/**
 * Garante que qualquer acesso à seção de código procedida pela 
 * chamada dessa função seja apenas pelo método POST
 * 
 * @param string|null   $redirecionarPara a página para a qual essa função 
 *                      redireciona caso o acesso seja indevido. É /pages/index.php por padrão.
 */
function impedirAcessoIndevido(string|null $redirecionarPara = "/pages/index.php")
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

function isLogado()
{
    return isset($_SESSION['usuario']) && isset($_SESSION['senha']);
}