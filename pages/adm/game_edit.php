<?php
include 'assets/includes/user_validation.php';
include 'assets/includes/adm_validation.php';
?>
<main>
  <?php
    if (isset($_GET['idjogo'])) {
      $_SESSION['idjogo'] = $_GET['idjogo'];
    }
  ?>
  <div class="container container-kodika">
    <h2>Alteração de dados do Jogo</h2>
    <form method="post" action="pages/form/game_edit_sql.php">
      <div class="row">
        <div class="form-group col form-kodika">
          <label for="title">Título</label>
          <input type="text" class="form-control" name="title" required value="<?php echo ($_GET['titulo']); ?>">
        </div>
        <div class="form-group col form-kodika">
          <label for="developer">Desenvolvedor(a)</label>
          <input type="text" class="form-control" name="developer" required value="<?php echo ($_GET['desenvolvedora']); ?>">
        </div>
        <div class="form-group col form-kodika">
          <label for="languages">Idiomas</label>
          <input type="text" class="form-control" name="languages" required value="<?php echo ($_GET['idiomas']); ?>">
        </div>
        <div class="form-group col form-kodika">
          <label for="release_date" class="form-label">Data de Lançamento</label>
          <input class="form-control" type="date" name="release_date" required value="<?php echo ($_GET['datalancamento']); ?>">
        </div>
      </div>
      <div class="form-group form-kodika">
        <label for="description">Descrição</label>
        <textarea class="form-control" name="description" rows="3" required><?php echo ($_GET['descricao']); ?></textarea>
      </div>
      <div class="form-group form-kodika">
        <label for="media">Mídia</label>
        <input type="text" class="form-control" name="media" required value="<?php echo ($_GET['midia']); ?>">
      </div>
      <div class="form-group form-kodika">
        <label for="genero">Gênero</label>
        <select class="custom-select custom-select-lg mb-3" name="genero">
          <option value="">Selecione um genêro:</option>
          <?php
          include 'assets/includes/connect.php';
          $query = sprintf("SELECT * FROM genero");
          $dados = mysqli_query($conexao, $query) or die(mysql_error());
          $linha = mysqli_fetch_assoc($dados);
          $total = mysqli_num_rows($dados);
          if($total > 0) {
            do {
              if ($linha['idgenero'] == $_GET['idgenero']) {
                ?>
                <option value="<?php echo ($_GET['idgenero']) ?>" selected><?php echo ($_GET['genero']) ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $linha['idgenero'] ?>"><?php echo $linha['titulo'] ?></option>
                <?php
            }
            }while($linha = mysqli_fetch_assoc($dados));
          } else {
            ?>
            <option value="">Nenhuma opção disponível.</option>
            <?php
          }
          mysqli_free_result($dados);
          ?>
        </select>
      </div>
      <div class="form-group form-kodika">
        <input type="submit" value="Salvar alterações" class="btn btn-info btn-gamereg">
      </div>
    </form>
  </div>
</main>
