<?php
  include '../../assets/includes/user_validation.php';
  include '../../assets/includes/adm_validation.php';
  include '../../assets/includes/connect.php';
  if (isset($_SESSION['idgenero'])) {
    $title = $_POST['title'];
    $idgenero = $_SESSION['idgenero'];

    $query = sprintf("SELECT titulo FROM genero WHERE titulo = '$title';");
    $dados = mysqli_query($conexao, $query) or die(mysql_error());
    $linha = mysqli_fetch_assoc($dados);

    if (empty($linha)) {
      $query = sprintf("UPDATE genero SET titulo = '$title' WHERE idgenero = '$idgenero';");
      mysqli_query($conexao, $query);

      unset($_SESSION['idgenero']);
      header('Location: ../../index.php?page=genrelist&sucesso=801');
    } else {
      header('Location: ../../index.php?page=genrelist&erro=702');
    }

  } else {
    header('Location: ../../index.php?page=genrelist&erro=701');
  }
