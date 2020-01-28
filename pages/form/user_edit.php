<?php
include '../../assets/includes/user_validation.php';
include '../../assets/includes/connect.php';

//Todos os campos preenchidos
$id = $_GET['idusuario'];
$user = trim($_POST['user']);
$email = trim($_POST['email']);
$password = trim(md5($_POST['password']));
$confpassword = trim(md5($_POST['confpassword']));

//Verifica se a senha e a confirmação são iguais
if ($password == $confpassword) {
  //Realiza o cadastro
  $query = mysqli_query($conexao, "UPDATE usuario SET nick='$user', email='$email', senha='$password' WHERE idusuario='$id'") or die(mysqli_error($conexao));
  header('Location: ../../index.php?page=userprofile');
} else {
  //Confirmação de senha não bate com a senha digitada
  header('Location: ../../index.php?page=userprofile');
}
