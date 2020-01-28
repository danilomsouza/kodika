<header>
  <div class="row container-navbar">
    <div class="container col-4 container-nav-inside">
      <h1 class="kodika logo">Kodika</h1>
      <h6 class="by-aspas logo">by Aspas</h6>
    </div>
    <nav class="col-8 container-nav-inside">
      <ul class="nav justify-content-end navbar container-nav-inside">
        <li class="nav-item">
          <a class="nav-link <?php if ($get == 'home') { echo 'current-page'; } ?>" href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($get == 'mygames') { echo 'current-page'; } ?>" href="index.php?page=mygames">Meus Jogos</a>
        </li>
        <div class="dropdown">
          <a class="nav-link <?php if ($get == 'userprofile') { echo 'current-page'; } ?> nav-item dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="" role="button">Perfil</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item nav-link" href="index.php?page=userprofile">Meu Perfil</a>
            <a class="dropdown-item nav-link" href="assets/includes/logout.php">Logout</a>
          </div>
        </div>
        <div class="dropdown" <?php
        if(session_status() == PHP_SESSION_NONE){
          session_start();
          if ($_SESSION['login'] != 'adm') {
            echo ('style="display: none;"');
          }
        }
        ?>>
          <a class="nav-link nav-item dropdown-toggle <?php switch ($get) { case 'gamelist': case 'genrelist': case 'gamereg': case 'genrereg': case 'editGame': case 'editGenre': echo 'current-page'; } ?>" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="" role="button">Adm</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item nav-link" href="index.php?page=gamelist">Jogos Cadastrados</a>
            <a class="dropdown-item nav-link" href="index.php?page=genrelist">Gêneros Cadastrados</a>
          </div>
        </div>
      </ul>
    </nav>
  </div>
</header>
