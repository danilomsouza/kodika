<?php
include 'assets/includes/connect.php';
$query = sprintf("SELECT * FROM jogo");
$dados = mysqli_query($conexao, $query) or die(mysql_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);
if ($total > 0) {
  do {
    ?>
    <script>
      function emBreve () {
        alert("Em Breve!");
      }
    </script>
    <div class="game col">
      <a href="index.php?page=gamedetails&idjogo=<?php echo ($linha['idjogo']); ?>">
        <img class="game-image" src="<?php echo ($linha['midia']);?>">
      </a>
      <div class="game-bottom">
        <h3 class="game-title"><?php echo ($linha['titulo']);?></h3>
        <p class="game-dev">Desenvolvido por: <?php echo ($linha['desenvolvedora']);?></p>
        <p class="game-genre">Gênero: Ação, Aventura</p>
        <p class="game-genre">Lançamento: <?php
        $datalancamento = strtotime($linha['data_lancamento']);
        $datasistema = new DateTime();
        $datasistema = $datasistema->format('U');

        echo (date('d/m/Y', $datalancamento));

        if ($datalancamento <= $datasistema) {
          ?></p><a href="media/games/jimmyJimmy/index.php"><button type="button" class="game-button">Jogar</button></a><?php
        } else {
          ?></p><a href=""><button type="button" class="game-button" onclick="emBreve()">Jogar</button></a><?php
        }
        ?>
      </div>
    </div>
    <?php
  } while ($linha = mysqli_fetch_assoc($dados));
} else {
  ?>
    <h2 class="status-kodika">Nenhum jogo na biblioteca.</h2>
  <?php
}
mysqli_free_result($dados);
?>
