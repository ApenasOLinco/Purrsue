<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/auth/authUtil.php";
?>
<header>
    <nav>
        <!-- Logo -->
        <a href="/pages/index.php">Página inicial</a>

        <!-- Botão de deslogar -->
        <?php if (isLogado()): ?>
            <a href="/pages/CadastrarGato/cadastrarGato.php">Cadastrar Gato</a>
            <a href="/auth/logout.php">Logout</a>
        <?php endif; ?>
    </nav>
</header>