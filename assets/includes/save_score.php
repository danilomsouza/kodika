<?php
include 'connect.php';
session_start();

if (isset($_GET['score'])) {
  $score = $_GET['score'];
  $id = $_SESSION['idlogin'];

  $query = mysqli_query($conexao, "UPDATE usuario SET max_ptos = '$score' WHERE idusuario = '$id'") or die(mysqli_error($conexao));
}
