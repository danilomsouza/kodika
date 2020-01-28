<?php
include 'assets/includes/user_validation.php';
include 'assets/includes/connect.php';

$id = $_GET['idjogo'];
$query = sprintf("SELECT * FROM jogo WHERE idjogo = $id");
$dados = mysqli_query($conexao, $query) or die(mysql_error());
$linha = mysqli_fetch_assoc($dados);

$queryComment = sprintf("SELECT * FROM comentario WHERE jogo_idjogo = $id");
$dadosComment = mysqli_query($conexao, $queryComment);
$linhaComment = mysqli_fetch_assoc($dadosComment);
$totalComment = mysqli_num_rows($dadosComment);
if ($totalComment > 0) {
  $idusuario = $linhaComment['usuario_idusuario'];

  $queryUser = sprintf("SELECT nick FROM usuario WHERE idusuario = $idusuario");
  $dadosUser = mysqli_query($conexao, $queryUser) or die(mysql_error());
  $linhaUser = mysqli_fetch_assoc($dadosUser);
}
?>
<main>
  <div class="container container-kodika">
    <div class="container-game-details">
      <div class="row">
        <div class="col">
          <img src="<?php echo ($linha['midia']);?>" class="image-game-details">
        </div>
        <div class="col">
          <h2 class="col titulo-game-details"><?php echo ($linha['titulo']);?></h2>
          <p class="desc-game-details"><?php echo ($linha['descricao']);?></p>
          <p class="text-game-details">Desenvolvido por: <?php echo ($linha['desenvolvedora']);?></p>
          <p class="text-game-details">Gênero: Ação, Aventura</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2 class="coment-game-details">Comentários:</h2>
          <?php
          if ($totalComment > 0) {
            ?>
            <div class="estrelas estrela-game-details">
      				<input type="radio" id="vazio" name="estrela" value="" <?php if ($linhaComment['estrelas'] == 0) { echo ('checked'); } ?>>
      				<label for="estrela_um"><i class="fa"></i></label>
      				<input type="radio" id="estrela_um" name="estrela" value="1" <?php if ($linhaComment['estrelas'] == 1) { echo ('checked'); } ?>>
      				<label for="estrela_dois"><i class="fa"></i></label>
      				<input type="radio" id="estrela_dois" name="estrela" value="2" <?php if ($linhaComment['estrelas'] == 2) { echo ('checked'); } ?>>
      				<label for="estrela_tres"><i class="fa"></i></label>
      				<input type="radio" id="estrela_tres" name="estrela" value="3" <?php if ($linhaComment['estrelas'] == 3) { echo ('checked'); } ?>>
      				<label for="estrela_quatro"><i class="fa"></i></label>
      				<input type="radio" id="estrela_quatro" name="estrela" value="4" <?php if ($linhaComment['estrelas'] == 4) { echo ('checked'); } ?>>
      				<label for="estrela_cinco"><i class="fa"></i></label>
      				<input type="radio" id="estrela_cinco" name="estrela" value="5" <?php if ($linhaComment['estrelas'] == 5) { echo ('checked'); } ?>><br><br>
            </div>
            <div class="container-coment">
              <p class="comentario"><?php echo ($linhaComment['descricao']); ?></p>
              <h5 class="autor-comentario"><?php echo ($linhaUser['nick']); ?></h5>
            </div>
            <?php
          } else {
            ?>
            <div class="container-coment">
              <p class="comentario">Nenhum comentário, seja o primeiro!</p>
              <h5 class="autor-comentario"></h5>
            </div>
            <?php
          }
          ?>
        </div>
        <div class="col">
          <a href="index.php?page=comment&gameid=<?php echo ($linha['idjogo']); ?>"><button type="button" class="btn btn-primary btn-gamereg btn-game-details btn-game-coment">Comentar</button></a>
          <a href="index.php?page=mygames"><button type="button" class="btn btn-primary btn-gamereg btn-game-details btn-game-back">Voltar</button></a>
        </div>
      </div>
    </div>
  </div>
</main>
