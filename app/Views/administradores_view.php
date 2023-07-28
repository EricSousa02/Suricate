<?= $this->extend('home_layout') ?>

<?= $this->section('layout') ?>
<title>Administradores</title>




<style>
  .invalido input:invalid,
  .invalido select:invalid {
    border: 1px solid red;
    animation: shake .3s linear;
    transition: all 1s ease-in-out;
  }



  @keyframes shake {
    25% {
      transform: translateX(4px);
      border: 1px solid red;

    }

    50% {
      transform: translateX(-4px);
      border: 1px solid red;

    }

    75% {
      transform: translateX(4px);
      border: 1px solid red;

    }
  }



  .titulo {
    font-family: 'Poppins';
    text-shadow: 1px 1px #FFA500;
  }
</style>



<div class="container mt-3">
  <h3 class="text-center titulo">ADMINISTRADORES</h3>
  <nav class="navbar navbar-example navbar-expand-lg ">



    <div class="d-flex navbar-collapse" id="navbar-ex-4 ">
      <div class="navbar-nav me-auto">
        <button type="button" class="btn btn-success mb-2 me-2" data-toggle="modal" data-target="#addModal"><i class="fa-solid fa-plus" style="transform:translateX(-10px);"></i>Adicionar Novo</button>

      </div>
      <form class="d-flex">
        <div class="input-group mb-2 ">
          <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
          <input type="text" class="form-control" placeholder="Pesquisar" id="searchbar" onkeyup="search()" />
        </div>
      </form>
    </div>

  </nav>


  <?php if (count($administradores) == 0) : ?>

    <p class="text-center">Não existem administradores.</p>

  <?php else : ?>
    <div class="card table-responsive">
    <table class="table table-striped table-hover">
      <thead style="background: linear-gradient(#f37a1f,#f28832);">
        <tr>
          <th style="color: white;">Nome</th>
          <th style="color: white;">Email</th>
          <th style="color: white;">Ações</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($administradores as $row) : ?>
          <tr class="lista">
            <td><?= $row->nome; ?></td>
            <td><?= $row->email; ?></td>

            <td>

              <a href="#" data-toggle="tooltip" title="Editar" class="btn btn-info btn-sm btn-edit" style="margin: 2px;" data-id="<?= $row->id; ?>" data-nome="<?= $row->nome; ?>" data-email="<?= $row->email; ?>" data-senha="<?= $row->senha; ?>"><i class="fa-solid fa-pen"></i></a>

              <a href="#" data-toggle="tooltip" title="Excluir" class="btn btn-danger btn-sm btn-delete" style="margin: 2px;" data-id="<?= $row->id; ?>"><i class="fa-solid fa-trash"></i></a>


            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php endif; ?>
</div>

<!-- Modal Add Product-->
<form action="<?= base_url('/product/saveAdm') ?>" method="post">
  <div class="modal fade te" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar administrador</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome do administrador" required>
          </div>




          <div class="form-group mt-3">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="E-mail do administrador" required>
          </div>






          <div class="form-group mt-3">
            <label>Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha do administrador" required>
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" id="salvar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="<?= base_url('/product/updateAdm') ?>" method="post">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Administrador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">



          <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control nome" name="nome" placeholder="Nome do administrador" required>
          </div>




          <div class="form-group mt-3">
            <label>E-mail</label>
            <input type="email" class="form-control email" name="email" placeholder="E-mail do administrador" required>
          </div>






          <div class="form-group mt-3">
            <label>Senha</label>
            <input type="password" class="form-control senha" name="senha" placeholder="Senha do administrador" required>
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url('/product/deleteAdm') ?>" method="post">
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Administrador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <h4>deseja mesmo excluir esse(a) administrador(a)?</h4>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-danger">Sim</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Delete Product-->










<div class="demo-inline-spacing">

  <script src="<?= base_url('/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>"></script>
  <script>
    $(document).ready(function() {

      // get Edit Product
      $('.btn-edit').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const nome = $(this).data('nome');
        const email = $(this).data('email');
        const senha = $(this).data('senha');
        // Set data to Form Edit
        $('.id').val(id);
        $('.nome').val(nome);
        $('.email').val(email);
        $('.senha').val(senha);
        // Call Modal Edit
        $('#editModal').modal('show');
      });

      // get Delete Product
      $('.btn-delete').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.id').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
      });




    });



    const administradores = document.getElementById("administradores");



    administradores.classList = "menu-item active open";





    function search() {
      let input = document.getElementById('searchbar').value
      input = input.toLowerCase();
      let x = document.getElementsByClassName('lista');

      for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
          x[i].style.display = "none";
        } else {
          x[i].style.display = "";
        }
      }
    }




    const salvar = document.getElementById("salvar");
    const datetime_created = document.getElementById("datetime_created");
    const te = document.querySelector(".te");


    salvar.addEventListener('click', tempo);
    salvar.addEventListener('click', invalid);


    function tempo() {
      datetime_created.value = "<?= date('Y/m/d H:i:s') ?>";

    }

    function invalid() {

      te.classList.add('invalido');


      setTimeout(() => {

        te.classList.remove('invalido');

      }, 350);



    }



    //tooltip ativador
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

    //tooltip ativador\\
  </script>

  <?= $this->endSection() ?>