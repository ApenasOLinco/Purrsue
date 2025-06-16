<?php
// Tratamento dos códigos de erro enviados via GET
require_once "$ROOT/err/status.php";

$codigo = Status::tryFrom($_GET['codigo']);
if (isset($codigo)): ?>

    <h4 class="redirect-mensagem"><?= $codigo->getMensagem() ?></h4>
    
<?php endif; ?>