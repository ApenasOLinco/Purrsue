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
    <link rel="stylesheet" href="home.css">
    <title>Purrsue: Home</title>
</head>

<body>
    <?php $ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "$ROOT/components/cabecalho.php";
    require_once "$ROOT/components/mensagemDeRedirect.php";
    ?>

    <h2>CADASTRAR UM GATO</h2>
    <p class="subtitulo">Cadastre seu gatinho agora mesmo!</p>

    <form action="/auth/gatos/cadastro.php" method="post">
        <fieldset class="conjunto-fieldset">
            <label for="gato-nome">Nome do gatinho:</label>
            <input type="text" name="gato-nome" id="input-gato-nome">
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-descricao">Descreva seu gatinho para a gente:</label>
            <textarea name="gato-descricao" id="textarea-gato-descricao"
                placeholder="Ele gosta de comer... Ele é brincalhão / travesso / quieto"></textarea>
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-raca">Qual a raça dele?</label>
            <input type="text" name="gato-raca" id="input-gato-raca">
        </fieldset>

        <h4>Mostra ele pra gente?</h4>
        <button type="button" id="btn-adicionar-fotinho" onclick="adicionarFotinho()">Adicionar fotinho</button>
        <fieldset id="fotinhos-fieldset">

            <template id="fotinho-input-template">
                <fieldset class="fotinho-cont conjunto-fieldset">
                    <label for="fotinhos[]">Link pra fotinho:</label>
                    <input type="text" name="fotinhos[]">

                    <button type="button">Remover fotinho</button>
                </fieldset>
            </template>

        </fieldset>

        <button id="btn-enviar" type="submit">Enviar gatinho!!</button>
    </form>
    <script src="home.js"></script>
</body>

</html>