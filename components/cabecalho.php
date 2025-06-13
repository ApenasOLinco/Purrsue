<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/auth/authUtil.php";
?>

<header>
    <nav>
        <!-- Estado do menu (Aberto, Fechado) -->
        <input type="checkbox" id="menu-cabecalho-check">

        <!-- Logo -->
        <a href="/pages/index.php">
            <div id="header-logo-container">
                <img src="/assets/images/header-logo.png" alt="Logo da Purrsue">
            </div>
        </a>

        <!-- Botão de deslogar -->
        <?php if (isLogado()) : ?>
            <a href="/auth/logout.php">Logout</a>
        <?php endif; ?>
    </nav>
</header>