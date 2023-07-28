<?= $this->extend('login_layout') ?>

<?= $this->section('conteudo') ?>


<title>Login</title>


<!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">

              </span>

            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2 text-center titulo">Bem vindo</h4>
          <br>
          <?php if (isset($success)) : ?>

            <div class="alert alert-success text-success ">Registrado com sucesso</div>

          <?php endif; ?>

          <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger text-danger"><?= session()->getFlashdata('msg') ?></div>
          <?php endif; ?>

          <?= form_open('Product/auth') ?>
          <div class="mb-3">
            <label for="email" class="form-label" id="label-email">E-mail</label>
            <input type="email" class="form-control te" id="email" name="nomear" placeholder="insira seu e-mail" autofocus value="<?= old('email') ?>" required />
          </div>


          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="senha">Senha</label>
              <!-- <a href="#">
                <small>esqueceu a senha?</small>
              </a> -->
            </div>


            <div class="input-group input-group-merge">
              <input type="password" id="senha" class="form-control" name="senhar" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="<?= old('senha') ?>" required />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>






          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100 entrar" type="submit" id="button" onclick="invalid()">Entrar</button>
          </div>
          </form>

          <p class="text-center">
            <span>Novo em nossa plataforma?</span>
            <a href="<?= site_url("product/registrarAluno") ?>">
              <span>Crie uma conta</span>
            </a>

          </p>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<script>
  const te = document.querySelector(".te");
  const entrar = document.getElementById("entrar");


  function invalid() {

    te.classList.add('invalido');


    setTimeout(() => {

      te.classList.remove('invalido');

    }, 300);


  }
</script>

<!-- / Content -->
<!-- Helpers -->

<?= $this->endSection() ?>