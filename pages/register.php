<main>
  <div class="container">
    <div class="card loginBackground">
      <img src="media/img/logo_white.png" alt="logo kodika by aspas" class="logoLogin">
      <form class="login-form" action="pages/form/user_reg.php" method="post">
        <?php
        session_start();
        if(isset($_SESSION['erro'])) {
          $erro = $_SESSION['erro'];
          switch ($erro) {
            case '201':
              $mensagem = 'Os campos estão vazios.';
              break;
            case '202':
              $mensagem = 'Campo de usuário não foi preenchido.';
              break;
            case '203':
              $mensagem = 'Campo de e-mail não foi preenchido.';
              break;
            case '204':
              $mensagem = 'Campo de senha não foi preenchido.';
              break;
            case '205':
              $mensagem = 'Campo de confirmação não foi preenchido.';
              break;
            case '206':
              $mensagem = 'As senhas não coincidem.';
              break;
            case '207':
              $mensagem = 'E-mail já cadastrado.';
              break;
            case '208':
              $mensagem = 'Usuário já cadastrado.';
              break;
          }
          ?>
          <div class="card login-card login-card-error">
            <h4><?php echo $mensagem; ?></h4>
          </div>
          <?php
          unset($_SESSION['erro']);
        }
        if (isset($_SESSION['sucesso'])) {
          $sucesso = $_SESSION['sucesso'];
          switch ($sucesso) {
            case '101':
                $mensagem = 'Cadastro realizado com sucesso! Faça login <a href="index.php" class="link-cadastro">AQUI</a>.';
              break;
          }
          ?>
          <div class="card login-card login-card-success">
            <h4><?php echo $mensagem; ?></h4>
          </div>
          <?php
          unset($_SESSION['sucesso']);
        }
        ?>
        <div class="form-group login-input-wrap">
          <label class="login-input" for="user">Usuário:</label>
          <input class="login-input input-field-1" type="text" class="form-control" name="user" value="<?php if (isset($_GET['user'])) { echo ($_GET['user']); } ?>">
        </div>
        <div class="form-group login-input-wrap">
          <label class="login-input" for="email">E-mail:</label>
          <input class="login-input input-field-2" type="email" class="form-control" name="email" value="<?php if (isset($_GET['email'])) { echo ($_GET['email']); } ?>">
        </div>
        <div class="form-group login-input-wrap">
          <label class="login-input" for="password">Senha:</label>
          <input class="login-input input-field-3" type="password" class="form-control" name="password">
        </div>
        <div class="form-group login-input-wrap">
          <label class="login-input" for="confpassword">Confirme a senha:</label>
          <input class="login-input input-field-4" type="password" class="form-control" name="confpassword">
        </div>
        <button type="submit" class="btn btn-primary login-btn">Cadastrar</button>
        <a href="index.php" class="btn btn-primary login-btn">Voltar</a>
      </form>
    </div>
  </div>
</main>
