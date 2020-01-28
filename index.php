<?php
$get = isset($_GET['page'])? $_GET['page']:'';

include 'assets/includes/header.php';
if ($get == '' || $get == 'userreg') {
} else {
  include 'assets/includes/nav.php';
}

switch ($get) {
  //Páginas de usuário
  case 'home':
    include 'pages/home.php';
    break;
  case 'userprofile':
    include 'pages/user_profile.php';
    break;
  case 'mygames':
    include 'pages/games.php';
    break;
  case 'gamedetails':
    include 'pages/game_details.php';
    break;
  case 'comment':
    include 'pages/comment.php';
    break;
  //Páginas de Administrador
  case 'gamelist':
    include 'pages/adm/list_games.php';
    break;
  case 'genrelist':
    include 'pages/adm/list_genre.php';
    break;
  case 'gamereg':
    include 'pages/adm/game_registration.php';
    break;
  case 'genrereg':
    include 'pages/adm/genre_registration.php';
    break;
  case 'editGame':
    include 'pages/adm/game_edit.php';
    break;
  case 'editGenre':
    include 'pages/adm/genre_edit.php';
    break;
  //Páginas de login e registro
  case 'userreg':
    ?>
    <style>
      body {
        background-image: linear-gradient(to bottom right, rgb(0,183,211), rgb(84,99,171));
      }
    </style>
    <?php
    include 'pages/register.php';
    break;
  default:
    ?>
    <style>
      body {
        background-image: linear-gradient(to bottom right, rgb(0,183,211), rgb(84,99,171));
      }
    </style>
    <?php
    include 'pages/login.php';
}

if ($get == '' || $get == 'userreg') {
} else {
  include 'assets/includes/footer.php';
}
