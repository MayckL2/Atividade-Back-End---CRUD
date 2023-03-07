<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = md5(filter_input(INPUT_POST, 'senha'));

// VALIDA CPF
$cpf = str_replace(" ", "", $_POST['cpf']);
$confere = $cpf;

if (strlen($cpf) == 11) {
  $total = 0;
  $x = 11;
  for ($i = 0; $i < 9; $i++) {
    $x -= 1;
    $total += $cpf[$i] * $x;
  }

  $confere[9] = 11 - $total % 11;

  $total = 0;
  $x = 12;
  for ($z = 0; $z < 10; $z++) {
    $x -= 1;
    $total += $cpf[$z] * $x;
  }

  $confere[10] = 11 - $total % 11;

  if ($confere == $cpf) {
    if ($cpf[0] == $cpf[1] and $cpf[3] == $cpf[4] and $cpf[5] == $cpf[6] and $cpf[7] == $cpf[8]) {
      echo "<p class='invalido'>CPF INVALIDO!</p>";
      echo "<a href='index.php'>VOLTAR</a>";
      unset($_SESSION['cpf']);
    } else {
      echo "<p class='valido'>CPF VALIDO!</p>";
      echo "<a href='cadastrar.php'>PROSSEGUIR</a>";
      echo "<a href='index.php'>VOLTAR</a>";

      // PASSOU NA VALIDADE
      $result_usuario = "insert into empresa (nome, cpf, email, senha, criado) values ('$nome', '$cpf', '$email', '$senha', NOW())";
      $resultado_usuario = mysqli_query($con, $result_usuario);

      if (mysqli_insert_id($con)) {
        $_SESSION['msg'] = "<p style='color:green;'>USUARIO CADASTRADO COM SUCESSO</p>";
        header("location: index.php");
      } else {
        $_SESSION['msg'] = "<p style='color:red;'>USUARIO NAO FOI CADASTRO</p>";
        header("location: cadastro.php");
      }
    }
  } else {
    echo "<p class='invalido'>CPF INVALIDO!</p>";
    echo "<a href='cadastro.php'>VOLTAR</a>";
    unset($_SESSION['cpf']);
  }
} else {
  echo "<p class='invalido'>CPF INVALIDO!</p>";
  echo "<a href='cadastro.php'>VOLTAR</a>";
  unset($_SESSION['cpf']);
}

?>