<?php
  include 'assets/includes/user_validation.php';
  include 'assets/includes/adm_validation.php';
  include '../../assets/includes/connect.php';

  if (isset($_GET['idjogo'])) {
    $idjogo = $_GET['idjogo'];

    $query = sprintf("DELETE FROM jogo WHERE idjogo = '$idjogo';");
    mysqli_query($conexao, $query);

    header('Location: ../../index.php?page=gamelist&sucesso=802');
  }
