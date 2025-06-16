<?php
/**
 * Te chuta de volta pra página especificada. Ai! Ai!
 * 
 * Chuta pro index por padrão. Ui! Ui!
 */
function bicuda(Status $codigo, string $pagina = "/pages/index.php")
{
    header("location:$pagina?codigo=$codigo->value");
    die; // É tão forte que o código morre
}