<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   require_once "$ROOT/components/header.html";

   // Tratamento dos códigos enviados via GET
   $code = Status::tryFrom($_GET['code']);
   if (isset($code)) {
      echo $code->getMensagem();
   }
   ?>

   <form action="/auth/login.php" method="post">
      <label for="usuario">Nome de Usuário</label>
      <input type="text" name="usuario" id="usuario-input">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha-input">

      <input type="submit" value="Entrar">
   </form>

   <h3 class="nao-tem-conta-call">Ainda não tem conta?? Crie uma!</h3>

   <form action="/auth/cadastro.php">
   </form>
</body>

</html>