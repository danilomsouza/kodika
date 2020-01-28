<main>
  <?php
  include 'assets/includes/user_validation.php';
  include 'assets/includes/adm_validation.php';
  ?>
  <div class="container container-kodika">
    <h2>Alteração de dados do Perfil</h2>
    <form method="post" action="pages/form/perfil_edit_sql.php">
      <div class="row">
        <div class="form-group col">
          <label for="title">E-mail</label>
          <input type="text" class="form-control" name="email" required value="<?php echo ($_GET['email']); ?>">
        </div>
        <div class="form-group col">
          <label for="developer">Senha</label>
          <input type="text" class="form-control" name="senha" required value="<?php echo ($_GET['senha']); ?>">
        </div>
        <div class="form-group">
          <input type="submit" value="Salvar alterações" class="btn btn-info">
        </div>
      </form>
    </div>
  </div>
</main>
