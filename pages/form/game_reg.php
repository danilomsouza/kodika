<?php
include '../../assets/includes/user_validation.php';
include '../../assets/includes/adm_validation.php';
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['developer']) && isset($_POST['release_date']) && isset($_POST['languages']) && isset($_POST['media']) && isset($_POST['genero'])) {
  $title = $_POST['title'];
  $developer = $_POST['developer'];
  $languages = $_POST['languages'];
  $date = $_POST['release_date'];
  $description = $_POST['description'];
  $media = $_POST['media'];
  $genero = $_POST['genero'];

  $conexao = mysqli_connect("localhost", "root","", "jimmyjimmy");
  $query = mysqli_query($conexao, "INSERT INTO jogo VALUES(DEFAULT,'$title', '$description','$developer','$date','$languages', '$media', '$genero')") or die(mysqli_error($conexao));

  header('Location: ../../index.php?page=gamereg&sucesso=1');
} else {
  header('Location: ../../index.php?page=gamereg&erro=1');
}
