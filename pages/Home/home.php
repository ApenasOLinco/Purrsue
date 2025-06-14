<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once "$ROOT/auth/cadeado.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purrsue: Home</title>
</head>

<body>
    <?php $ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "$ROOT/components/cabecalho.php";
    ?>

    <h2>CADASTRAR UM GATO</h2>
    <p>Cadastre seu gatinho agora mesmo!</p>

    <form action="/auth/gatos/cadastro.php" method="post" enctype="multipart/form-data">
        <label for="gato-nome">Nome do gatinho:</label>
        <input type="text" name="gato-nome" id="input-gato-nome">

        <label for="gato-descricao">Descreva seu gatinho para a gente:</label>
        <textarea name="gato-descricao" id="textarea-gato-descricao"
            placeholder="Ele gosta de comer... Ele é brincalhão / travesso / quieto"></textarea>

        <label for="gato-raca">Qual a raça dele?</label>
        <input type="text" name="gato-raca" id="input-gato-raca">

        <h4>Mostra ele pra gente?</h4>
        <button type="button" id="btn-adicionar-fotinho" onclick="adicionarFotinho()">Adicionar fotinho</button>
        <fieldset id="fotinhos-fieldset">
            <template id="fotinho-input-template">
                <div class="fotinho-cont">
                    <input type="file" name="fotinhos[]" accept="image/*">
                    <button type="button">Remover fotinho</button>
                </div>
            </template>
        </fieldset>

        <button id="btn-enviar" type="submit">Enviar gatinho!!</button>
    </form>
    <script src="home.js"></script>
</body>

</html>