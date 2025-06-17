<?php $ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once "$ROOT/auth/cadeado.php";
require_once "$ROOT/err/redirecionar.php";
require_once "$ROOT/err/status.php";

// Fazer o UPDATE no banco de dados
require_once "$ROOT/connection/conn.php";
$conn = conectar_bd();
mysqli_autocommit($conn, false);

$id = $_POST['gato-id'];
$nome = $_POST['gato-nome'];
$descricao = $_POST['gato-descricao'];
$raca = $_POST['gato-raca'];
$fotinhos = $_POST['fotinhos'];

function cancelarCadastro(Status $codigo, mysqli $conn)
{
    $REDIRECIONAR_PARA = "/pages/EditarGato/editarGato.php?id=" . $_POST['gato-id'];
    mysqli_rollback($conn);
    mysqli_close($conn);
    bicuda($codigo, $REDIRECIONAR_PARA);
}

// Verificar se o gato tem o mesmo usuario_id que o usuario atual
$dono_do_gato = mysqli_query($conn, "SELECT usuario_id FROM _gatos WHERE id = $id")->fetch_assoc()['usuario_id'];

if ($dono_do_gato != $_SESSION['id']) {
    $codigo = Status::NAO_AUTORIZADO;
    cancelarCadastro($codigo,$conn);
}

// Montar a query de acordo com os dados enviados
$sets = [];
$parametros = [];
$types = '';

if (!empty($nome)) {
    $sets[] = "nome = ?";
    $parametros[] = $nome;
    $types .= 's';
}

if (!empty($descricao)) {
    $sets[] = "descricao = ?";
    $parametros[] = $descricao;
    $types .= 's';
}

if (!empty($raca)) {
    $sets[] = "raca = ?";
    $parametros[] = $raca;
    $types .= 's';
}

if (!count($sets) > 0) {
    $codigo = Status::FORM_EM_BRANCO;
    cancelarCadastro($codigo, $conn);
}

$query = "UPDATE _gatos SET " . implode(', ', $sets) . " WHERE id = ?";
$parametros[] = $id;
$types .= 'i';

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, $types, ...$parametros);
mysqli_stmt_execute($stmt);

$editado = mysqli_affected_rows($conn) === 1;

if (!$editado) {
    $codigo = Status::ERRO_NA_EDICAO;
    cancelarCadastro($codigo, $conn);
}

if (isset($fotinhos)) {
    // Adicionar fotinhos
    for ($i = 0; $i < count($fotinhos); $i++) {
        $url = $fotinhos[$i];

        // URL muito grande
        if (strlen($url) > 300) {
            $codigo = Status::URL_INVALIDA;
            cancelarCadastro($codigo, $conn);
        }

        // Verificar o link é válido e se tem o MIME type correto (deve ser image/*)
        $headers = @get_headers($url, true);

        // URL não é acessível
        if (!$headers) {
            $codigo = Status::URL_INVALIDA;
            cancelarCadastro($codigo, $conn);
        }

        // Verificar se o código de resposta da url é 200
        if (strpos($headers[0], '200') === false) {
            $codigo = Status::URL_INVALIDA;
            cancelarCadastro($codigo, $conn);
        }

        // Verificar se as headers da url contém o tipo de conteúdo
        if (!isset($headers['Content-Type'])) {
            $codigo = Status::URL_INVALIDA;
            cancelarCadastro($codigo, $conn);
        }

        $content_type = $headers['Content-Type'];
        $tipo = is_array($content_type) ? $content_type[0] : $content_type;

        // Verificar se o Content-Type equivale a image/*
        if (strpos($tipo, 'image/') !== 0) {
            $codigo = Status::URL_INVALIDA;
            cancelarCadastro($codigo, $conn);
        }

        // Insert no banco de dados
        $query = "INSERT INTO _fotos_gatos (gato_id, gato_foto_caminho) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            $codigo = Status::ERRO_NA_INSERCAO;
            cancelarCadastro($codigo, $conn);
        }

        mysqli_stmt_bind_param($stmt, "is", $id, $url);

        if (!mysqli_execute($stmt)) {
            $codigo = Status::ERRO_NA_INSERCAO;
            cancelarCadastro($codigo, $conn);
        }

        if (mysqli_affected_rows($conn) < 1) {
            $codigo = Status::ERRO_NA_INSERCAO;
            cancelarCadastro($codigo, $conn);
        }
    }
}

$conn->commit();
mysqli_close($conn);

$codigo = Status::EDICAO_SUCESSO;
bicuda($codigo);