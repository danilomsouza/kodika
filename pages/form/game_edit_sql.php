<?php
  include '../../assets/includes/user_validation.php';
  include '../../assets/includes/adm_validation.php';
  include '../../assets/includes/connect.php';

  if (isset($_SESSION['idjogo'])) {
    $titulo = $_POST['title'];
    $descricao = $_POST['description'];
    $datalancamento = $_POST['release_date'];
    $idiomas = $_POST['languages'];
    $midia = $_POST['media'];
    $desenvolvedora = $_POST['developer'];
    $idjogo = $_SESSION['idjogo'];

    $query = sprintf("UPDATE jogo SET titulo = '$titulo', descricao = '$descricao', data_lancamento = '$datalancamento', idiomas = '$idiomas', midia = '$midia', desenvolvedora = '$desenvolvedora' WHERE idjogo = '$idjogo';");
    mysqli_query($conexao, $query);

    unset($_SESSION['id']);
    header('Location: ../../index.php?page=gamelist&sucesso=801');
  }
