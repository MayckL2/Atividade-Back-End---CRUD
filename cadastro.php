<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <a href="index.php">Home</a>
  <a href="login.php">Login</a>
  <h1>Cadastrar usuario</h1>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>

  <form method="post" action="pro_cad_usuario.php">
    <label for="">Nome</label>
    <input type="text" name="nome" placeholder="Digite o nome completo" autofocus><br>

    <label>CPF</label>
    <input type="number" name="cpf" placeholder="Digite seu cpf"><br>

    <label>E-mail</label>
    <input type="email" name="email" placeholder="Digite o e-mail"><br>

    <label>Senha</label>
    <input type="password" name="senha" placeholder="Digite a senha"><br>

    <input type="submit" value="Enviar">
  </form>
</body>

</html>