<?php
  session_start();
  include_once("conexao.php");

  // $login = $_POST['login'];
  $login= filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
  $senha= md5(filter_input(INPUT_POST, 'senha'));

  $comandoSql= "select email from empresa where '$login' = email";
  $resultado_usuario= mysqli_query($con, $comandoSql);
  
  if(mysqli_affected_rows($con)){
    

    $comandoSql= "select senha from empresa where '$senha' = senha";
    $resultado_usuario= mysqli_query($con, $comandoSql);

    if(mysqli_affected_rows($con)){
      $_SESSION['msg']= "<p style='color:green;'>USUARIO LOGADO</p>";
      header("location: index.php");
    }else{
      $_SESSION['msg']= "<p style='color:red;'>USUARIO NAO EXISTE</p>";
      header("location: login.php");
  }
  }else{
    $_SESSION['msg']= "<p style='color:red;'>USUARIO NAO EXISTE</p>";
    header("location: login.php");
  }
?>