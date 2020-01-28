<?php
include 'assets/includes/user_validation.php';
include 'assets/includes/adm_validation.php';
?>
<main>
  <?php
  if (isset($_GET['idgenero'])) {
    $_SESSION['idgenero'] = $_GET['idgenero'];
  }
  ?>
  <div class="container">
    <h2>Alteração de dados do Genero</h2>
    <form method="post" action="pages/form/genre_edit.php">
      <div class="row">
        <div class="form-group col">
          <label for="title">Título</label>
          <input type="text" class="form-control" name="title" required value="<?php echo ($_GET['titulo']); ?>">
        </div>
        <div class="form-group">
          <input type="submit" value="Salvar alterações" class="btn btn-info">
        </div>
    </form>
  </div>
</main>
