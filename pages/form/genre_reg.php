<?php
include 'assets/includes/user_validation.php';
include 'assets/includes/adm_validation.php';
if (isset($_POST['title'])) {
  $title = $_POST['title'];

  $conexao = mysqli_connect("localhost", "root","", "jimmyjimmy");
  $query = mysqli_query($conexao, "INSERT INTO genero VALUES(DEFAULT,'$title')") or die(mysqli_error($conexao));

  header('Location: ../../index.php?page=genrereg&sucesso=1');
} else {
  header('Location: ../../index.php?page=genrereg&erro=1');
}
