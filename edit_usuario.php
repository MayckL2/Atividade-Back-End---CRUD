<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "select * from empresa where id = '$id'";
$resultado_usuario = mysqli_query($con, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

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
  <a href="cad_usuario.php">Cadastrar</a><br>
  <a href="index.php">Listar</a>
  <h1>Editar Usuario</h1>
  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  <form action="pro_edit_usuario.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

    <label for="">Nome:</label>
    <input type="text" name="nome" placeholder="Digite o nome completo" autofocus value="<?php echo $row_usuario['nome']; ?>"><br>

    <label for="">E-mail:</label>
    <input type="text" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>">

    <input type="submit" value="salvar">
  </form>
</body>

</html>