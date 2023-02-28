<?php
session_start();
include_once('conexao.php');

$id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome= htmlspecialchars($_POST['nome']);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

$comandoSql= "update empresa set nome='$nome', email='$email', modificado= NOW() where id = '$id'";
$resultado_usuario= mysqli_query($con, $comandoSql);

if(mysqli_affected_rows($con)){
  $_SESSION['msg']= "<p style='color:green;'>USUARIO EDITADO COM SUCESSO</p>";
  header("location: index.php");
}else{
  $_SESSION['msg']= "<p style='color:red;'>USUARIO NAO FOI EDITADO</p>";
  header("location: edit_usuario.php?id=$id");
}
?>