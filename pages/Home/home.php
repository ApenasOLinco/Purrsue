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
    <?php // Cabeçalho e mensagem de redirecionamento
    require_once "$ROOT/components/cabecalho.php";
    require_once "$ROOT/components/mensagemDeRedirect.php";
    ?>

    <?php // Mostrar todos os gatos cadastrados
    require_once "$ROOT/connection/conn.php";
    require_once "$ROOT/auth/authUtil.php";

    $conn = conectar_bd();

    $usuario_id = $_SESSION['id'];
    $query = "SELECT * FROM _gatos WHERE usuario_id = $usuario_id";
    $resultado = mysqli_query($conn, $query);

    if (!$resultado) {
        $codigo = Status::ERRO_NA_CONSULTA;
        bicuda($codigo);
    }

    // Nenhum gato cadastrado :(
    if (mysqli_num_rows($resultado) < 1): ?>
        <h3 id="como-assim-h3">Quê?? Você ainda não cadastrou NENHUM GATO? D:</h3>
    <?php die(); endif;

    ?>
    <!-- Estrutura da tabela -->
    <table>
        <tr>
            <thead>
                <th>Nome</th>
                <th>Raça</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
        </tr>

        <tbody>
            <?php // Gatos
            while ($gato = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?= $gato['nome'] ?></td>

                    <td><?= $gato['raca'] ?></td>

                    <td><?= $gato['descricao'] ?></td>

                    <td>
                        <a class="tabela-acao excluir" href="/auth/gatos/excluir.php?<?= $gato['id'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

        <?php mysqli_close($conn); ?>

    </table>
    <script src="home.js"></script>
</body>

</html>