<?= $this->extend('home_layout') ?>

<?= $this->section('layout') ?>



<style>
  @media(orientation: portrait) {


    .data {
      margin-top: 13.8px;
    }



  }


  @media (max-width: 1000px) {

    .extra {
      display: none;
    }

  }
</style>
<title>Início</title>

<!-- Content wrapper -->
<div class="content-wrapper what">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y ">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Bem vindo administrador <?= $admin ?>! 🎉</h5>
                <?php if (count($unfinished) == 0) : ?>

                  <p class="mb-4">
                    Não há justificativas para serem visualizadas
                  </p>

                <?php elseif (count($unfinished) == 1) : ?>

                  <p class="mb-4">
                    Há <span class="fw-bold"><?= count($unfinished) ?></span> justificativa não visualizada
                  </p>

                <?php else : ?>

                  <p class="mb-4">
                    Há <span class="fw-bold"><?= count($unfinished) ?></span> justificativas não visualizadas
                  </p>

                <?php endif; ?>

                <a href="<?= site_url('Product') ?>" class="btn btn-sm btn-outline-primary">ver justificativas</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="<?= base_url('assets/sneat/assets/img/illustrations/man-with-laptop-light.png') ?>" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <a href="<?= site_url('Product/adm') ?>" class="btn btn-warning btn-sm " style="margin: 2px;"> <i class="fa-solid fa-pen-to-square fs-6"></i></a>
                  </div>

                </div>
                <span class=" d-block mb-1">Administrador</span>

                <?php if (count($admins) == 0) : ?>


                  <h6 class="card-title mb-2 mt-1">Nenhum administrador</h6>

                <?php elseif (count($admins) > 0) : ?>
                  <h3 class="card-title mb-2 "><?= count($admins) ?></span></h3>


                <?php endif; ?>

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <a href="<?= site_url('Product/alunos_cadastrados') ?>" class="btn btn-success btn-sm " style="margin: 2px;"><i class="fa-solid fa-user fs-6"></i></a>
                  </div>

                </div>
                <span>Alunos</span>




                <?php if (count($aluno) == 0) : ?>
                  <h6 class="card-title mb-2 mt-3">Nenhum aluno</h6>

                <?php elseif (count($aluno) > 100000000000) : ?>

                  <h6 class="card-title mb-2 "><?= count($aluno) ?></h6>


                <?php elseif (count($aluno) > 0) : ?>

                  <h3 class="card-title mb-2 mt-1"><?= count($aluno) ?></h3>

                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </div>





      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2 ">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <a href="<?= site_url('Product') ?>" class="btn btn-info btn-sm " style="margin: 2px;"> <i class="fa-solid fa-list fs-6"></i></a>

                  </div>

                </div>
                <span class="d-block mb-1 ">Justificativas</span>

                <?php if (count($product) == 0) : ?>
                  <h6 class="card-title mb-2 mt-1">Nenhuma justificativa</h6>
                <?php elseif (count($product) > 0) : ?>
                  <h3 class="card-title text-nowrap mb-2"><?= count($product) ?></h3>

                <?php endif; ?>
              </div>
            </div>
          </div>




          <?php if (count($datetime) == 0) : ?>
            <!-- ultimo envio -->
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0" style="cursor: default;">
                      <a href="#" class="btn btn-dark btn-sm disabled" style="margin: 2px;"> <i class="fa-solid fa-clock fs-6"></i></a>
                    </div>

                  </div>
                  <span class=" d-block mb-1 text-wrap">Ultimo envio</span>
                  <h6 class="card-title mb-2 text-wrap data">
                    Nenhuma justificativa
                  </h6>


                </div>
              </div>
            </div>







          <?php elseif (count($datetime) > 0) : ?>
            <!-- ultimo envio -->
            <div class="col-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0" style="cursor: default;">
                      <a href="#" class="btn btn-danger btn-sm disabled" style="margin: 2px;"> <i class="fa-solid fa-clock fs-6"></i></a>
                    </div>

                  </div>
                  <span class=" d-block mb-1 text-wrap">Ultimo envio</span>
                  <h6 class="card-title mb-2 text-wrap data"><?php foreach ($datetime as $row) : ?>
                      <?= date($row->datetime_created) ?>
                    <?php endforeach; ?>
                  </h6>


                </div>
              </div>
            </div>
          <?php endif; ?>




          <!-- </div>
    <div class="row"> -->

        </div>

      </div>

      <div class="col-sm-6 col-lg-8 mb-4 order-1 pb-3 extra">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><i class="fa-solid fa-star" style="color: #FFD700;"></i>  Objetivo do sistema</h5>
            <p class="card-text">
              Este sistema foi criado para auxiliar os professores e diretorias de escolas à simplificar o processo de gerenciamento de justificativas de falta dos alunos.
            </p>
            <p class="card-text"><small class="text-muted">EricSousaDeAndrade ©
                <script>
                  document.write(new Date().getFullYear());
                </script>

              </small></p>
          </div>
        </div>
      </div>

    </div>
    <div class="row">




    </div>

  </div>
  <!-- / Content -->

  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



<script>
  const home = document.getElementById("home");

  home.classList = "menu-item active open";
</script>
<?= $this->endSection() ?>