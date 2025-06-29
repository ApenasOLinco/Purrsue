<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/auth/cadeado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "$ROOT/components/importarCSS.php"; ?>
    <link rel="stylesheet" href="cadastrarGato.css">
    <title>Cadastrar Gato!</title>
</head>

<body>
    <?php
    require_once "$ROOT/components/cabecalho.php";
    require_once "$ROOT/components/mensagemDeRedirect.php";
    ?>

    <main>
        <h2>CADASTRAR UM GATO</h2>
        <p class="subtitulo">Cadastre seu gatinho agora mesmo!</p>
    
        <form action="/auth/gatos/cadastro.php" method="post">
            <fieldset class="conjunto-fieldset">
                <label for="gato-nome">Nome do gatinho:</label>
                <input type="text" name="gato-nome" id="input-gato-nome" required>
            </fieldset>
    
            <fieldset class="conjunto-fieldset">
                <label for="gato-descricao">Descreva seu gatinho para a gente:</label>
                <textarea name="gato-descricao" id="textarea-gato-descricao"
                    placeholder="Ele gosta de comer... Ele é brincalhão / travesso / quieto" required></textarea>
            </fieldset>
    
            <fieldset class="conjunto-fieldset">
                <label for="gato-raca">Qual a raça dele?</label>
                <input type="text" name="gato-raca" id="input-gato-raca" required>
            </fieldset>
    
            <h4>Mostra ele pra gente?</h4>
            <?php require_once "$ROOT/components/FormFotinhos/formFotinhos.php" ?>
    
            <button id="btn-enviar" type="submit">Enviar gatinho!!</button>
        </form>
    </main>
</body>

<script src="cadastrarGato.js"></script>

</html>
