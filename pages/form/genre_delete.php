<?php
  include '../../assets/includes/connect.php';
  session_start();

  if (isset($_GET['idgenero'])) {
    $titulo = $_POST['title'];
    $idgenero = $_GET['idgenero'];


    $query = sprintf("DELETE from genero WHERE idgenero = '$idgenero';");
    mysqli_query($conexao, $query);

    header('Location: ../../index.php?page=genrelist&sucesso=801');
  } else {
    header('Location: ../../index.php?page=genrelist&erro=701');
  }
