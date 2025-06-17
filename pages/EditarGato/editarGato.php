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
    <title>Purrsue: Editar gato!</title>
</head>

<body>
    <?php
    require_once "$ROOT/components/mensagemDeRedirect.php";
    require_once "$ROOT/components/cabecalho.php";

    if (!isset($_GET['id'])): ?>
        <h4>Parece que não foi passado um id pra edição :/ tente novamente.</h4>
        <?php die();
    endif;

    require_once "$ROOT/connection/conn.php";
    $conn = conectar_bd();

    $stmt = $conn->prepare("SELECT * FROM _gatos WHERE id = ?");
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $gato = $result->fetch_assoc();

    if (!$gato): ?>
        <h4>Houve um erro inesperado ao obter os dados desse bichano... Achamos que ele fugiu.</h4>
        <?php die();
    endif;

    $conn->close();

    if ($gato['usuario_id'] !== $_SESSION['id']): ?>
        <h4>Ops! Esse gato não é seu, bobinho!</h4>
        <?php die();
    endif;
    ?>

    <h2>Editar gato</h2>
    <p class="subtitulo">Banho e tosa, temos de tudo!</p>

    <form action="/auth/gatos/editarGato.php" method="post">
        <input type="hidden" name="gato-id" value="<?= $_GET['id'] ?>">

        <fieldset class="conjunto-fieldset">
            <label for="gato-nome">Trocou de nome?</label>
            <input type="text" name="gato-nome" id="input-gato-nome" placeholder="<?= $gato['nome'] ?>">
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-descricao">Quer mudar a descrição dele?</label>
            <textarea name="gato-descricao" id="textarea-gato-descricao"
                placeholder="<?= $gato['descricao'] ?>"></textarea>
        </fieldset>

        <fieldset class="conjunto-fieldset">
            <label for="gato-raca">Trocar a raça?</label>
            <input type="text" name="gato-raca" id="input-gato-raca" placeholder="<?= $gato['raca'] ?>">
        </fieldset>

        <h4>Quer adicionar mais fotinhos?</h4>
        <?php require_once "$ROOT/components/FormFotinhos/formFotinhos.php"; ?>

        <button type="submit">Editar gatinho</button>
    </form>
</body>

</html>