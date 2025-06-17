<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/auth/cadeado.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "$ROOT/components/importarCSS.php" ?>
    <title>Purrsue: Editar gato!</title>
</head>

<body>
    <?php
    require_once "$ROOT/components/mensagemDeRedirect.php";
    require_once "$ROOT/components/cabecalho.php"
        ?>
    <h2>Editar gato</h2>
    <p class="subtitulo">Banho e tosa, temos de tudo!</p>

    <form action="/auth/gatos/editarGato.php">
        <fieldset class="conjunto-fieldset">
            <label for="gato-nome">Trocou de nome?</label>
            <input type="text" name="gato-nome" id="input-gato-nome">
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-descricao">Quer mudar a descrição dele?</label>
            <textarea name="gato-descricao" id="textarea-gato-descricao"
                placeholder="Ele gosta de comer... Ele é brincalhão / travesso / quieto"></textarea>
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-raca">Trocar a raça?</label>
            <input type="text" name="gato-raca" id="input-gato-raca">
        </fieldset>

        <h4>Quer adicionar mais fotinhos?</h4>
        <?php require_once "$ROOT/components/FormFotinhos/formFotinhos.php" ?>
    </form>
</body>

</html>