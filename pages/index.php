<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$ROOT/err/status.php";
require_once "$ROOT/auth/authUtil.php";

// Se o usuário já está logado, redireciona ele pra home.
session_start();
if (isLogado()) {
   // Redireciona com o código recebido via GET, se aplicável
   $codigo = Status::tryFrom($_GET['codigo'])?->value;

   header("location:/pages/Home/home.php" . ($codigo === null ? "" : "?codigo=$codigo"));
   die();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php require_once "$ROOT/components/importarCSS.php" ?>
   <title>Purrsue: Entrar!</title>
</head>

<body>
   <?php
   require_once "$ROOT/components/cabecalho.php";

   require_once "$ROOT/components/mensagemDeRedirect.php";
   ?>

   <!-- Formulário de Login -->
   <h2>Entre no Purrsue</h2>
   <h4>Seu site para compartilhar o amor por gatinhos!</h4>
   <form action="/auth/login.php" method="post" id="login-form">
      <fieldset class="conjunto-fieldset">
         <label for="usuario">Nome de Usuário:</label>
         <input type="text" name="usuario" id="login-usuario-input" required>
      </fieldset>

      <fieldset class="conjunto-fieldset">
         <label for="senha">Senha:</label>
         <input type="password" name="senha" id="login-senha-input" required>
      </fieldset>

      <button type="submit">Entrar!</button>
   </form>

   <h2 class="nao-tem-conta-call">Ainda não tem conta?? Crie uma!</h2>
   <form action="/auth/cadastro.php" method="post" id="cadastro-form">
      <fieldset class="conjunto-fieldset">
         <label for="usuario">Nome de Usuário:</label>
         <input type="text" name="usuario" id="cadastro-usuario-input" required>
      </fieldset>

      <fieldset class="conjunto-fieldset">
         <label for="senha">Senha:</label>
         <input type="password" name="senha" id="cadastro-senha-input" required>
      </fieldset>

      <fieldset class="conjunto-fieldset">
         <label for="email">E-Mail:</label>
         <input type="text" name="email" id="cadastro-email-input" required>
      </fieldset>

      <button type="submit">Criar conta!!!</button>
   </form>
</body>

</html>