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
   // Cabeçalho (Nav) da página
   require_once "$ROOT/components/header.html";

   // Tratamento dos códigos de erro enviados via GET
   $codigo = Status::tryFrom($_GET['codigo']);
   if (isset($codigo)) {
      echo $codigo->getMensagem();
   }
   ?>

   <!-- Formulário de Login -->
   <form action="/auth/login.php" method="post" id="login-form">
      <label for="usuario">Nome de Usuário:</label>
      <input type="text" name="usuario" id="login-usuario-input">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="login-senha-input">

      <input type="submit" value="Entrar!">
   </form>

   <h3 class="nao-tem-conta-call">Ainda não tem conta?? Crie uma!</h3>
   <form action="/auth/cadastro.php" method="post" id="cadastro-form">
      <label for="usuario">Nome de Usuário:</label>
      <input type="text" name="usuario" id="cadastro-usuario-input">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="cadastro-senha-input">

      <label for="cadastro-email-input">E-Mail:</label>
      <input type="email" name="email" id="cadastro-email-input">

      <input type="submit" value="Criar conta!">
   </form>
</body>

</html>