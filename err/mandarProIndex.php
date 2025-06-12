<?php
/**
 * Te chuta de volta pro index. Ai! Ai!
 */
function bicuda(Status $codigo)
{
    header("location:/pages/index.php?codigo=$codigo->value");
    die; // É tão forte que o código morre
}