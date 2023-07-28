
<?= $this->extend('login_layout') ?>

<?= $this->section('conteudo') ?>





<title>Registrar</title>

<!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="#" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">

              </span>

            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2 text-center titulo">Registrar-se</h4>
          <br>

          <?php if(isset($erro)):?>

            <div class="alert alert-danger text-danger ">Usuario ja existente</div>

          <?php endif; ?>

          <?= form_open('Product/submissao') ?>
          <div class="mb-3">
            <label for="nome" class="form-label" id="label-nome">Nome</label>
            <input type="text" class="form-control tee" id="nome" name="nome"  placeholder="insira seu nome completo" minlength="3" autofocus pattern="[A-Za-z ]*" value="<?= old('nome') ?>" re/>
          </div>


          <div class="mb-3">
            <label for="email" class="form-label" id="label-nome">Email</label>
            <input type="email" class="form-control" id="email" name="email"  placeholder="insira seu e-mail"  value="<?= old('email') ?>" required/>
          </div>



          <div class="mt-3">
            <label for="exampleFormControlSelect1">Turma</label>
            <select class="form-select" id="exampleFormControlSelect1" required name="turma" aria-label="Default select example" >
              <option value="" style="background: #B2B2B2; color: #3C4048;">Selecione a turma</option>
              <option value="1° Ano - Turma A">1° Ano - Turma A</option>
              <option value="1° Ano - Turma B">1° Ano - Turma B</option>
              <option value="1° Ano - Turma C">1° Ano - Turma C</option>
              <option value="1° Ano - Turma D">1° Ano - Turma D</option>
              <option value="2° Ano - Turma A">2° Ano - Turma A</option>
              <option value="2° Ano - Turma B">2° Ano - Turma B</option>
              <option value="2° Ano - Turma C">2° Ano - Turma C</option>
              <option value="2° Ano - Turma D">2° Ano - Turma D</option>
              <option value="3° Ano - Turma A">3° Ano - Turma A</option>
              <option value="3° Ano - Turma B">3° Ano - Turma B</option>
              <option value="3° Ano - Turma C">3° Ano - Turma C</option>
              <option value="3° Ano - Turma D">3° Ano - Turma D</option>


            </select>
          </div>


          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="senha">Senha</label>
              <!-- <a href="#">
                <small>esqueceu a senha?</small>
              </a> -->
            </div>


            <div class="input-group input-group-merge">
              <input type="password" id="senha" class="form-control" name="senha" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="<?= old('senha') ?>" required/>
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>




          <!-- <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" />
              <label class="form-check-label" for="remember-me"> relembre-me </label>
            </div>
          </div> -->


          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit" id="entrar" onclick="invalid()">Entrar</button>
          </div>
          </form>



        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>



<!-- / Content -->
<!-- Helpers -->
<script>


const tee = document.querySelector(".tee");
const entrar = document.getElementById("entrar");


function invalid() {

tee.classList.add('invalido');


setTimeout(() => {

  tee.classList.remove('invalido');

}, 300);


}
</script>

<?= $this->endSection() ?>