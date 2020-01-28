<?php
session_start();
include '../../assets/includes/connect.php';

if (empty($_POST['user']) && empty($_POST['email']) && empty($_POST['password']) && empty($_POST['confpassword'])) {
  //Todos os campos vazios
  $_SESSION['erro'] = 201;
  header('Location: ../../index.php?page=userreg');
} elseif (empty($_POST['user'])) {
  //Campo usuário vazio
  $_SESSION['erro'] = 202;
  header('Location: ../../index.php?page=userreg');
} elseif (empty($_POST['email'])) {
  //Campo email vazio
  $_SESSION['erro'] = 203;
  header('Location: ../../index.php?page=userreg');
} elseif (empty($_POST['password'])) {
  //Campo senha vazio
  $_SESSION['erro'] = 204;
  header('Location: ../../index.php?page=userreg&user='.$_POST['user'].'&email='.$_POST['email'].'');
} elseif (empty($_POST['confpassword'])) {
  //Campo confirmação de senha vazio
  $_SESSION['erro'] = 205;
  header('Location: ../../index.php?page=userreg&user='.$_POST['user'].'&email='.$_POST['email'].'');
} else {
  //Todos os campos preenchidos
  $user = trim($_POST['user']);
  $email = trim($_POST['email']);
  $password = trim(md5($_POST['password']));
  $confpassword = trim(md5($_POST['confpassword']));

  $queryExistingUser = mysqli_query($conexao, "select count(*) as total from usuario where nick = '$user'");
  $linhaExistingUser = mysqli_fetch_assoc($queryExistingUser);

  //Verifica se o usuário digitado já existe
  if ($linhaExistingUser['total'] == 0) {
    $queryExistingEmail = mysqli_query($conexao, "select count(*) as total from usuario where email = '$email'");
    $linhaExistingEmail = mysqli_fetch_assoc($queryExistingEmail);

    //Verifica se o e-mail já existe
    if ($linhaExistingEmail['total'] == 0) {
      //Verifica se a senha e a confirmação são iguais
      if ($password == $confpassword) {
        //Realiza o cadastro
        $query = mysqli_query($conexao, "insert into usuario (idusuario, nick, email, senha) values (default, '$user', '$email', '$password')") or die(mysqli_error($conexao));
        $_SESSION['sucesso'] = 101;
        header('Location: ../../index.php?page=userreg');
      } else {
        //Confirmação de senha não bate com a senha digitada
        $_SESSION['erro'] = 206;
        header('Location: ../../index.php?page=userreg&user='.$user.'&email='.$email.'');
      }
    } else {
      //Email já existe
      $_SESSION['erro'] = 207;
      header('Location: ../../index.php?page=userreg');
    }
  } else {
    //Usuário já existe
    $_SESSION['erro'] = 208;
    header('Location: ../../index.php?page=userreg');
  }
}
