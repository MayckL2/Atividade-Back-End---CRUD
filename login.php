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
  <a href="cadastro.php">Cadastrar</a>
  <a href="index.php">Listar</a>

  <?php
    session_start();
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    };
  ?>
  <form action="pro_login_usuario.php" method="post">
    <label for="">Login</label>
    <input type="text" name="login" placeholder="insira seu e-mail">
    <label for="">Senha</label>
    <input type="password" name="senha" placeholder="insira seu senha">
    <input type="submit">
  </form>

</body>

</html>