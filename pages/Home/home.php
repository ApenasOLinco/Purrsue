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

    <script src="home.js"></script>
</body>

</html>