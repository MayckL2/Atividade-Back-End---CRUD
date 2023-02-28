<?php
session_start();
include_once("conexao");
//receber o id que ver com a url
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
  $result_usuario= "delete from usuarios where id= '$id'";
  $resultado_usuario= mysqli_query($con, $result_usuario);
  if(mysqli_affected_rows($con)){
    $_SESSION['msg']= "<p style='color:green'>USUARIO DELETADO COM SUCESSO</p>";
    header("location: index.php");
  }else{
    $_SESSION['msg']= "<p style='color:red;'>Erro: o usuario nao foi apagado</p>";
    header("location: index.php");
  }
}else{
  $_SESSION['msg']= "<p style='color:red;'>Selecione um usuario</p>";
  header("location: index.php");
}

?>