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
    <?php
    $ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once "$ROOT/components/header.php";
    ?>
    <a href="/auth/logout.php">Logout</a>
</body>
</html>