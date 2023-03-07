<?php
session_start();
include_once("conexao.php");
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
  <a href="cadastro.php">Cadastrar</a>
  <a href="login.php">Login</a>

  <?php
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  //receber o numero da pagina
  $pagina_atual= filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
  $pagina= (!empty($pagina_atual)) ? $pagina_atual : 1;

  //configurar a quantidade de itens por pagina
  $qnt_result_pg= 3;

  //calcular o inicio visualizado
  $inicio= ($qnt_result_pg * $pagina) - $qnt_result_pg;

  $result_usuarios= "select * from empresa limit $inicio, $qnt_result_pg";
  $resultado_usuarios= mysqli_query($con, $result_usuarios);
  while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
    echo "<hr>";
    echo "<div class='user'>";
    echo "<p> ID: ". $row_usuario['id']. "</p>";
    echo "<p>Nome: ". $row_usuario['nome']. "</p>";
    echo "<p>CPF: ". $row_usuario['cpf']. "</p>";
    echo "<p>E-mail: ". $row_usuario['email']. "</p>";
    echo "<a href='edit_usuario.php?id=". $row_usuario['id']. "'>Editar</a>";
    echo "<a href='pro_apagar_usuario.php?id=". $row_usuario['id']. "'>Apagar</a>";
    echo "</div>";
  }
  echo "<hr>";

  //Paginaçao - soma quantidade de usuarios:
  $result_pg = "select count(id) as num_result from empresa";
  $resultado_pg= mysqli_query($con, $result_pg);
  $row_pg = mysqli_fetch_assoc($resultado_pg);

  $quantidade_pg= ceil($row_pg['num_result'] / $qnt_result_pg);

  //limita os links antes e depois
  $max_links= 2;
  echo "<div class='pags'>";
  echo "<a href= 'index.php?pagina=1'>Primeira</a>";

  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
    if($pag_ant >= 1){
      echo "<a href= 'index.php?pagina=$pag_ant'>$pag_ant</a>";
    }
  }

  echo $pagina;

  for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
    if($pag_dep <= $quantidade_pg){
      echo "<a href= 'index.php?pagina=$pag_dep'>$pag_dep</a>";
    }
  }

  echo "<a href= 'index.php?pagina=$quantidade_pg'>Ultima</a>";
  echo "</div>"
  ?>
</body>
</html>