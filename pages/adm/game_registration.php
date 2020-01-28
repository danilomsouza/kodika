<?php
include 'assets/includes/user_validation.php';
include 'assets/includes/adm_validation.php';
?>
<main>
  <div class="container container-kodika">
    <h2 class="status-kodika">Cadastro de Jogo</h2>
    <form method="post" action="pages/form/game_reg.php">
      <div class="row">
        <div class="form-group col form-kodika">
          <label for="title">Título</label>
          <input type="text" class="form-control" name="title" placeholder="Título do Jogo..." required>
        </div>
        <div class="form-group col form-kodika">
          <label for="developer">Desenvolvedor(a)</label>
          <input type="text" class="form-control" name="developer" placeholder="Ex.: Aspas Games" required>
        </div>
        <div class="form-group col form-kodika">
          <label for="languages">Idiomas</label>
          <input type="text" class="form-control" name="languages" placeholder="Ex.: Inglês, Português, etc..." required>
        </div>
        <div class="form-group col form-kodika">
          <label for="release_date" class="form-label">Data de Lançamento</label>
          <input class="form-control" type="date" value="" name="release_date" required>
        </div>
      </div>
      <div class="form-group form-kodika">
        <label for="description">Descrição</label>
        <textarea class="form-control" name="description" rows="3" placeholder="Digite aqui a descrição do jogo..." required></textarea>
      </div>
      <div class="form-group form-kodika">
        <label for="media">Mídia</label>
        <input type="text" class="form-control" name="media" placeholder="Ex.: media/img/nome_da_foto.png" required>
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
              ?>
              <option value="<?php echo $linha['idgenero'] ?>"><?php echo $linha['titulo'] ?></option>
              <?php
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
        <input type="submit" value="Cadastrar" class="btn btn-info btn-gamereg">
      </div>
    </form>
  </div>
</main>
