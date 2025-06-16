<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ROOT = $_SERVER['DOCUMENT_ROOT'];
require_once "$ROOT/err/status.php";
require_once "$ROOT/err/redirecionar.php";
require_once "$ROOT/auth/authUtil.php";

const REDIRECIONAR_PARA = "/pages/CadastrarGato/cadastrarGato.php";

// Restringe acesso a somente usuários logados
if (!isLogado()) {
    $codigo = Status::NAO_AUTORIZADO;
    bicuda($codigo, REDIRECIONAR_PARA);
}

impedirAcessoIndevido(REDIRECIONAR_PARA);
impedirFormularioEmBranco(REDIRECIONAR_PARA);

require_once "$ROOT/connection/conn.php";

$conn = conectar_bd();

// Desativar autocommit para que o gato só seja adicionado se todos os link pras suas fotinhos sejam válidos
mysqli_autocommit($conn, false);

function cancelarCadastro(Status $codigo, mysqli $conn)
{
    mysqli_rollback($conn);
    mysqli_close($conn);
    bicuda($codigo, REDIRECIONAR_PARA);
}

// Propriedades do gato
$nome = $_POST['gato-nome'];
$descricao = $_POST['gato-descricao'];
$raca = $_POST['gato-raca'];

$query = "INSERT INTO _gatos (usuario_id, nome, descricao, raca) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    $codigo = Status::ERRO_NA_INSERCAO;
    cancelarCadastro($codigo, $conn);
}

mysqli_stmt_bind_param($stmt, "isss", $_SESSION['id'], $nome, $descricao, $raca);

if (!mysqli_execute($stmt)) {
    $codigo = Status::ERRO_NA_INSERCAO;
    cancelarCadastro($codigo, $conn);
}

$id = mysqli_insert_id($conn);

$fotinhos = $_POST['fotinhos'];

print_r($fotinhos);

// Verificar se foi enviada ao menos uma foto
if (!$fotinhos or count($fotinhos) < 1) {
    $codigo = Status::FORM_EM_BRANCO;
    cancelarCadastro($codigo, $conn);
}

// Insert de todas as fotos enviadas no banco de dados
for ($i = 0; $i < count($fotinhos); $i++) {
    // URL muito grande
    if (count($fotinhos) > 300) {
        $codigo = Status::URL_INVALIDA;
        cancelarCadastro($codigo, $conn);
    }

    $url = $fotinhos[$i];
    
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

mysqli_commit($conn);
mysqli_close($conn);
$codigo = Status::CADASTRO_SUCESSO;
bicuda($codigo);