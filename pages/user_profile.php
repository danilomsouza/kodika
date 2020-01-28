<?php
  include 'assets/includes/user_validation.php';
  if( isset($_SESSION['login'])){
    $user = $_SESSION['login'];
  }
  $connect = mysqli_connect ('localhost', 'root', '', 'jimmyjimmy');
  $query = "SELECT * FROM usuario WHERE nick = '$user' ORDER BY idusuario DESC";
  $query_result = mysqli_query ($connect, $query);
  $result = mysqli_fetch_array($query_result);
?>
<main>
  <div class="container container-profile row">
    <div class="col row">
      <img src="media/img/avatar.jpg" alt="" class="col avatar">
      <div class="col">
        <h2 class="nickname"><?php echo $result['nick'] ?></h2>
      </div>
    </div>
    <div class="col fundo-pontos">
      <h3 class="pontuacao">Pontos: <?php echo $result['max_ptos'] ?></h3>
    </div>
  </div>
  <div class="container container-kodika container-edit-profile">
    <h2>Editar meus dados:</h2>
    <form method="post" action="pages/form/user_edit.php?idusuario=<?php echo $result['idusuario'] ?>">
      <div class="row">
        <div class="form-group col">
          <label for="nick">Nick</label>
          <input type="text" class="form-control" name="user" value="<?php echo $result['nick'] ?>" required>
        </div>
        <div class="form-group col">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group col"></div>
      </div>
      <div class="row">
        <div class="form-group col">
          <label for="email">E-mail</label>
          <input type="e-mail" class="form-control" name="email" value="<?php echo $result['email'] ?>" required>
        </div>
        <div class="form-group col">
          <label for="confsenha">Confirme a senha</label>
          <input type="password" class="form-control" name="confpassword" value="" required>
        </div>
        <div class="form-group col align-self-end">
          <input type="submit" value="Salvar" class="btn btn-info btn-profile">
        </div>
      </div>
    </form>
  </div>
</main>
