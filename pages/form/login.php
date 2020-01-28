<?php
session_start();
include('../../assets/includes/connect.php');

if (empty($_POST['user']) && empty($_POST['password'])) {
  //Ambos os campos vazios
  $_SESSION['erro'] = 101;
  header('Location: ../../index.php');
} elseif (empty($_POST['user']) && !empty($_POST['password'])) {
  //Campo usuário vazio
  $_SESSION['erro'] = 102;
  header('Location: ../../index.php');
} elseif (!empty($_POST['user']) && empty($_POST['password'])) {
  //Campo senha vazio
  $_SESSION['erro'] = 103;
  header('Location: ../../index.php');
} elseif (!empty($_POST['user']) && !empty($_POST['password'])) {
  //Campos preenchidos
  $user = $_POST['user'];
  $password = $_POST['password'];
  //Armazena informações digitadas para utilização na validação

  $queryUser = sprintf("select nick from usuario where nick = '$user'");
  $dadosUser = mysqli_query($conexao, $queryUser) or die(mysql_error());
  $linhaUser = mysqli_fetch_assoc($dadosUser);
  //Faz a seleção no banco de dados do usuário digitado

  //Verificação das informações digitadas
  if (empty($linhaUser)) {
    //Usuário inexistente
    $_SESSION['erro'] = 104;
    header('Location: ../../index.php');
  } elseif (!empty($linhaUser)) {
    //Usuário existe
    $queryPass = sprintf("select senha from usuario where nick = '$user' and senha = md5('$password')");
    $dadosPass = mysqli_query($conexao, $queryPass) or die(mysql_error());
    $linhaPass = mysqli_fetch_assoc($dadosPass);
    //Faz a seleção da senha cadastrada cruzando com a senha digitada

    if (!empty($linhaPass)) {
      //Senha correta

      $queryUserId = sprintf("select idusuario from usuario where nick = '$user'");
      $dadosUserId = mysqli_query($conexao, $queryUserId) or die(mysql_error());
      $linhaUserId = mysqli_fetch_assoc($dadosUserId);

      $_SESSION['idlogin'] = $linhaUserId['idusuario'];
      $_SESSION['login'] = $user;
      header('Location: ../../index.php?page=home');
    } else {
      //Senha incorreta
      $_SESSION['erro'] = 105;
      header('Location: ../../index.php');
    }
  }
}
