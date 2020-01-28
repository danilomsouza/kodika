<?php
include 'assets/includes/user_validation.php';
if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  ?> <script> alert('<?php echo $msg; ?>'); </script> <?php
  unset($_SESSION['msg']);
}
?>
<main>
  <div class="container container-kodika">
    <form class="login-form" action="pages/form/comment_reg.php?gameid=<?php echo ($_GET['gameid']); ?>" method="post">
      <div class="form-group login-input-wrap">
        <h2>Deixe sua opinião:</h2>
  			<div class="estrelas">
  				<input type="radio" id="vazio" name="estrela" value="" checked>
  				<label for="estrela_um"><i class="fa"></i></label>
  				<input type="radio" id="estrela_um" name="estrela" value="1">
  				<label for="estrela_dois"><i class="fa"></i></label>
  				<input type="radio" id="estrela_dois" name="estrela" value="2">
  				<label for="estrela_tres"><i class="fa"></i></label>
  				<input type="radio" id="estrela_tres" name="estrela" value="3">
  				<label for="estrela_quatro"><i class="fa"></i></label>
  				<input type="radio" id="estrela_quatro" name="estrela" value="4">
  				<label for="estrela_cinco"><i class="fa"></i></label>
  				<input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
        </div>
        <textarea class="form-control comment-area" name="commit" rows="3" placeholder="Digite aqui seu comentário..." ></textarea>
      </div>
      <button type="submit" class="btn btn-primary login-btn">Comentar</button>
      <a href="index.php?page=gamedetails&idjogo=<?php echo ($_GET['gameid']); ?>" class="btn btn-primary login-btn">Voltar</a>
    </form>
  </div>
</main>
