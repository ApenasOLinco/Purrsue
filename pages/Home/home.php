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

    <h2>SEUS GATOS</h2>
    <p class="subtitulo">Os bixanos que você cadastrou</p>

    <?php // Mostrar todos os gatos cadastrados
    require_once "$ROOT/connection/conn.php";
    require_once "$ROOT/auth/authUtil.php";

    $conn = conectar_bd();

    $usuario_id = $_SESSION['id'];

    $query =
        "SELECT
            g.*,
            fg.gato_foto_caminho
        FROM _gatos g
        INNER JOIN _fotos_gatos fg ON g.id = fg.gato_id
        WHERE g.usuario_id = $usuario_id";

    $result = mysqli_query($conn, $query);

    $gatos = [];

    // Armazenar os gatos em um array associativo
    while ($row = mysqli_fetch_assoc($result)) {
        // id do gato atual
        $gato_id = $row['id'];

        // Se o gato ainda não tiver sido armazenado, armazenar ele
        if (!isset($gatos[$gato_id])) {
            $gatos[$gato_id] = [
                'id' => $gato_id,
                'nome' => $row['nome'],
                'descricao' => $row['descricao'],
                'raca' => $row['raca'],
                'fotos' => []
            ];
        }

        // Adiciona a foto do resultado atual no gato com o id do resultado atual
        $gatos[$gato_id]['fotos'][] = $row['gato_foto_caminho'];
    }


    // Erro ao recuperar informaçõe do banco de dados
    if (!$result) {
        $codigo = Status::ERRO_NA_CONSULTA;
        bicuda($codigo);
    }

    // Nenhum gato cadastrado :(
    if (mysqli_num_rows($result) < 1): ?>
        <h3 id="como-assim-h3">Quê?? Você ainda não cadastrou NENHUM GATO? D:</h3>
        <?php die();
    endif;

    // Fechar a conexão
    mysqli_close($conn);

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
            foreach ($gatos as $gato): ?>
                <tr class="gato-info-row">
                    <td><?= $gato['nome'] ?></td>
                    <td><?= $gato['raca'] ?></td>
                    <td><?= $gato['descricao'] ?></td>
                    <td>
                        <a class="tabela-acao excluir" href="/auth/gatos/excluir.php?<?= $gato['id'] ?>">
                            <button>Excluir</button>
                        </a>

                        <button popovertarget="fotinho<?= $gato['id'] ?>">Ver fotos!!</button>

                        <!-- Popover com fotinhos do gato -->
                        <div id="fotinho<?= $gato['id'] ?>" class="fotinhos" popover>
                            <?php foreach ($gato['fotos'] as $foto): ?>
                                <img src="<?= $foto ?>" alt="fotinho do gato">
                            <?php endforeach; ?>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="home.js"></script>
</body>

</html>