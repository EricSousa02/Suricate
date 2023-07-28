<?= $this->extend('home_layout') ?>

<?= $this->section('layout') ?>


<title>Justificativas</title>




<style>
  .invalido input:invalid,
  .invalido select:invalid,
  .invalido textarea:invalid {
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

  #imagem {
    border-radius: 5px;
  }


  #imagemlook {
    border-radius: 5px;
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    border: 2px solid	#D3D3D3;
  }










  .titulo {
    font-family: 'Poppins';
    text-shadow: 1px 1px #2196f3;
  }

  .recusar {
    padding-left: 13px;
    padding-right: 13px;
  }

  .aceitar {
    padding-left: 11.8px;
    padding-right: 11.8px;
  }


  .opcoes {
    padding: 3px 7px;

  }






  @media(orientation:portrait) {

    th:nth-child(3),
    td:nth-child(3) {
      display: none;
    }

    th:nth-child(5),
    td:nth-child(5) {
      display: none;
    }

    th:nth-child(2),
    td:nth-child(2) {
      display: none;
    }
  }
</style>



<div class="container mt-3">
  <h3 class="text-center titulo">JUSTIFICATIVAS</h3>
  <nav class="navbar navbar-example navbar-expand-lg ">



    <div class="d-flex navbar-collapse" id="navbar-ex-4 ">
      <div class="navbar-nav me-auto">

        <button type="button" class="btn btn-primary mb-2 me-5" data-bs-toggle="modal" data-bs-target="#modalScrollable">
          <i class="fa-solid fa-circle-info" style="transform:translateX(-10px);"></i>
          Ajuda
        </button>
      </div>
      <form class="d-flex">
        <div class="input-group mb-2 ">
          <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
          <input type="text" class="form-control" placeholder="Pesquisar" id="searchbar" onkeyup="search()" />
        </div>
      </form>
    </div>

  </nav>

  <?php if (count($product) == 0) : ?>

    <p class="text-center">Não existem justificativas.</p>

  <?php else : ?>
    <div class="card table-responsive text-nowrap">
      <table class="table table-striped table-hover ">
        <thead class=" " style="background: linear-gradient(#2196f3,#4682B4);">
          <tr>
            <th style="color: white;">Aluno</th>
            <th style="color: white; display: none;">Motivo da falta</th>
            <th style="color: white;">Turma</th>
            <th style="color: white;">Data de envio</th>
            <th style="color: white;">Visualizado</th>
            <th style="color: white;">Atestado/Comprovante</th>
            <th style="color: white;" class="text-center">Status</th>
            <th style="color: white;">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($product as $row) : ?>
            <tr class="lista" id="lista">
              <td><?= $row->product_name; ?></td>
              <td style="display: none;"><?= $row->product_price; ?></td>
              <td><?= $row->category_name; ?></td>
              <td><?= $row->datetime_created; ?></td>


              <?php if (empty($row->finished)) : ?>
                <td id="finalizado" class="finalizado">Não visualizado</td>


              <?php else : ?>
                <td id="finalizado" class="finalizado"><?= $row->finished; ?></td>
              <?php endif; ?>



              <?php if (empty($row->imagem)) : ?>

                <td>Sem anexo</td>

              <?php else : ?>

                <td> Anexado <i class="fa-solid fa-paperclip"></i></td>

              <?php endif; ?>




              <td data-toggle="tooltip" style="display:none;" id="status"><?= $row->status; ?></td>

              <?php if (empty($row->status)) : ?>

                <td class="text-center"><span class="badge bg-label-primary me-1 ">em espera</span></td>


              <?php elseif ($row->status == "finalizado") : ?>


                <td class="text-center"><span class="badge bg-label-success me-1">Aceito</span></td>

              <?php elseif ($row->status == "recusado") : ?>

                <td class="text-center"><span class="badge bg-label-danger me-1">Recusado</span></td>


              <?php endif; ?>



              <?php if (empty($row->status)) : ?>
                <td class="text-wrap">





                  <div class="">
                    <div class="btn-group ">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle hide-arrow opcoes" style="margin: 5px;" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded fs-4"></i>
                      </button>
                      <div class="dropdown-menu  ">

                        <?php if (empty($row->finished)) : ?>

                          <a href="#" data-toggle="tooltip" data-bs-placement="top" title="Aceitar justificativa" data-id="<?= $row->product_id; ?>" style="margin: 5px 5px 5px 25px;" class="btn btn-success btn-sm btn-finished aceitar"><i class="fa-solid fa-check"></i></a>
                          <a href="#" data-toggle="tooltip" data-bs-placement="top" title="Recusar justificativa" data-id="<?= $row->product_id; ?>" style="margin: 5px 5px 5px 5px;" class="btn btn-danger btn-sm btn-finished-negate recusar"><i class="fa-solid fa-x"></i></a>

                        <?php else : ?>

                          <a href="#" class="btn btn-secondary btn-sm btn-finished disabled" style="margin: 5px;"><i class="fa-solid fa-check"></i></a>
                          <a href="#" class="btn btn-secondary btn-sm btn-finished-negate disabled recusar" style="margin: 5px;"><i class="fa-solid fa-x"></i></a>

                        <?php endif; ?>

                        <?php if (empty($row->imagem)) : ?>


                          <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look-noImage" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>
                        <?php else : ?>


                          <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>

                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </td>

              <?php elseif ($row->status == "finalizado") : ?>
                <td>



                  <?php if (empty($row->finished)) : ?>

                    <a href="#" data-id="<?= $row->product_id; ?>" style="margin: 2px;" class="btn btn-success btn-sm btn-finished"><i class="fa-solid fa-check"></i></a>
                    <a href="#" data-id="<?= $row->product_id; ?>" style="margin: 2px;" class="btn btn-danger btn-sm btn-finished-negate recusar"><i class="fa-solid fa-x"></i></a>



                  <?php else : ?>




                  <?php endif; ?>



                  <?php if (empty($row->imagem)) : ?>


                    <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look-noImage" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>
                  <?php else : ?>


                    <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>

                  <?php endif; ?>
                </td>

              <?php elseif ($row->status == "recusado") : ?>
                <td>



                  <?php if (empty($row->finished)) : ?>

                    <a href="#" data-id="<?= $row->product_id; ?>" style="margin: 2px;" class="btn btn-success btn-sm btn-finished"><i class="fa-solid fa-check"></i></a>
                    <a href="#" data-id="<?= $row->product_id; ?>" style="margin: 2px;" class="btn btn-danger btn-sm btn-finished-negate recusar"><i class="fa-solid fa-x"></i></a>



                  <?php else : ?>





                  <?php endif; ?>



                  <?php if (empty($row->imagem)) : ?>


                    <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look-noImage" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>
                  <?php else : ?>


                    <a href="#" data-toggle="tooltip" title="Visualizar" style="margin: 0 5px;" class="btn btn-warning btn-sm btn-look" data-complement="<?= $row->complemento; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-eye"></i></a>

                  <?php endif; ?>



                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>





<!-- Modal Edit Product-->
<form action="<?= base_url('/product/update') ?>" method="post">
  <div class="modal fade edit" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Justificativa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Aluno</label>
            <input type="text" class="form-control product_name" name="product_name" required placeholder="Nome do Aluno">
          </div>


          <div class="mt-3">
            <label for="exampleFormControlSelect1">Motivo</label>
            <select class="form-select product_price" id="exampleFormControlSelect1" required name="product_price" aria-label="Default select example">
              <option value="" style="background: #B2B2B2; color: #3C4048;">-Selecione o motivo-</option>
              <option value="Doença do aluno"> Doença do aluno</option>
              <option value="Transporte">Transporte</option>
              <option value="Isolamento profilático">Isolamento profilático</option>
              <option value="Morte de um familiar">Morte de um familiar</option>
              <option value="Nascimento de irmão">Nascimento de irmão</option>
              <option value="Tratamento ambulatório">Tratamento ambulatório</option>
              <option value="Assistência na doença a familiar">Assistência na doença a familiar</option>
              <option value="Gravidez">Gravidez</option>
              <option value="Religião">Religião</option>
              <option value="Cultura">Cultura</option>
              <option value="Desporto de alta competição">Desporto de alta competição</option>
              <option value="Obrigações legais">Obrigações legais</option>
              <option value="Facto impeditivo aceitável">Facto impeditivo aceitável</option>
              <option value="Suspensão preventiva">Suspensão preventiva</option>
              <option value="Visitas de estudo">Visitas de estudo</option>


            </select>
          </div>

          <div class="form-group mt-3">
            <label>Turma</label>
            <select name="product_category" class="form-select product_category" required>
              <option value="">-Selecione a turma-</option>
              <?php foreach ($category as $row) : ?>
                <option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <div class="form-group mt-3">
            <label for="complementoModal">Complemento</label>
            <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" value="teucu" rows="3" required></textarea>
          </div>


        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_id" class="product_id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" id="atualizar">Atualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Edit Product-->



<!-- Modal Look Product-->

<div class="modal fade" id="modalLook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar Justificativa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>Aluno</label>
          <input type="text" class="form-control product_name" name="product_name" required placeholder="Nome do Aluno" disabled>
        </div>


        <div class="mt-3">
          <label for="exampleFormControlSelect1">Motivo</label>
          <select class="form-select product_price" id="exampleFormControlSelect1" required name="product_price" aria-label="Default select example" disabled>
            <option value="" style="background: #B2B2B2; color: #3C4048;">-Selecione o motivo-</option>
            <option value="Doença do aluno"> Doença do aluno</option>
            <option value="Transporte">Transporte</option>
            <option value="Isolamento profilático">Isolamento profilático</option>
            <option value="Morte de um familiar">Morte de um familiar</option>
            <option value="Nascimento de irmão">Nascimento de irmão</option>
            <option value="Tratamento ambulatório">Tratamento ambulatório</option>
            <option value="Assistência na doença a familiar">Assistência na doença a familiar</option>
            <option value="Gravidez">Gravidez</option>
            <option value="Religião">Religião</option>
            <option value="Cultura">Cultura</option>
            <option value="Desporto de alta competição">Desporto de alta competição</option>
            <option value="Obrigações legais">Obrigações legais</option>
            <option value="Facto impeditivo aceitável">Facto impeditivo aceitável</option>
            <option value="Suspensão preventiva">Suspensão preventiva</option>
            <option value="Visitas de estudo">Visitas de estudo</option>


          </select>
        </div>

        <div class="form-group mt-3">
          <label>Turma</label>
          <select name="product_category" class="form-select product_category" required disabled>
            <option value="">-Selecionar-</option>
            <?php foreach ($category as $row) : ?>
              <option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>


        <input type="hidden" class="form-control visualizado_por" name="visualizado_por" id="visualizado_por" required placeholder="Administrador que visualizou" disabled>



        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>


        <div class="form-group mt-3">
          <label for="imagemlook">Atestado</label>
          <br>
          <img src="" alt="" id="imagemlook" data-bs-toggle="modal" data-bs-target="#imageModal">
        </div>

      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_id" class="product_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

<!-- End Modal Look Product-->



<!-- Modal Look Product/sem atestado-->

<div class="modal fade" id="modalLookNoImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar Justificativa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>Aluno</label>
          <input type="text" class="form-control product_name" name="product_name" required placeholder="Nome do Aluno" disabled>
        </div>


        <div class="mt-3">
          <label for="exampleFormControlSelect1">Motivo</label>
          <select class="form-select product_price" id="exampleFormControlSelect1" required name="product_price" aria-label="Default select example" disabled>
            <option value="" style="background: #B2B2B2; color: #3C4048;">-Selecione o motivo-</option>
            <option value="Doença do aluno"> Doença do aluno</option>
            <option value="Transporte">Transporte</option>
            <option value="Isolamento profilático">Isolamento profilático</option>
            <option value="Morte de um familiar">Morte de um familiar</option>
            <option value="Nascimento de irmão">Nascimento de irmão</option>
            <option value="Tratamento ambulatório">Tratamento ambulatório</option>
            <option value="Assistência na doença a familiar">Assistência na doença a familiar</option>
            <option value="Gravidez">Gravidez</option>
            <option value="Religião">Religião</option>
            <option value="Cultura">Cultura</option>
            <option value="Desporto de alta competição">Desporto de alta competição</option>
            <option value="Obrigações legais">Obrigações legais</option>
            <option value="Facto impeditivo aceitável">Facto impeditivo aceitável</option>
            <option value="Suspensão preventiva">Suspensão preventiva</option>
            <option value="Visitas de estudo">Visitas de estudo</option>


          </select>
        </div>

        <div class="form-group mt-3">
          <label>Turma</label>
          <select name="product_category" class="form-select product_category" required disabled>
            <option value="">-Selecionar-</option>
            <?php foreach ($category as $row) : ?>
              <option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>


        <input type="hidden" class="form-control visualizado_por" name="visualizado_por" id="visualizado_por" required placeholder="Administrador que visualizou" disabled>



        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>




      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_id" class="product_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

<!-- End Modal Look Product/sem atestado-->





<!-- Modal Delete Product-->
<form action="<?= base_url('/product/delete') ?>" method="post">
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Justificativa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <h4>deseja mesmo excluir a justificativa?</h4>

        </div>





        <div class="modal-footer">
          <input type="hidden" name="product_id" class="productID">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-danger">Sim</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal Delete Product-->


<!-- Modal finaliza Product-->
<form action="<?= base_url('/product/finish') ?>" method="post">
  <div class="modal fade" id="finishedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Marcar como aceito</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <h5>Deseja mesmo confirmar a justificativa?</h5>




        </div>





        <div class="modal-footer">
          <input type="hidden" name="product_id" class="productID">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-success">Sim</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal finaliza Product-->





<!-- Modal nega-->
<form action="<?= base_url('/product/negate') ?>" method="post">
  <div class="modal fade" id="finishedModalNegate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Marcar como recusado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <h5>Deseja mesmo recusar a justificativa?</h5>


          <div class="form-group mt-4">
          <label for="comentario">Enviar comentario</label>
          <textarea type="text" maxlength="500" class="comentario form-control" id="comentario" name="comentario_adm"  rows="3"></textarea>
        </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_id" class="productID">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-danger">Sim</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal nega-->






<!-- Modal de ajuda-->
<div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true" aria-labelledby="modalScrollableTitle" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalScrollableTitle">Como funciona</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Dicas</h5>
        <ul>
          <li style="list-style: none;">


            <p>Os titulos das colunas também são filtros.</p>

          </li>
        </ul>
        <h5>Opções</h5>
        <ul>
          <li style="list-style: none;">



            <p>
              1. Doença do aluno ---
              O encarregado de educação deve informar a escola quando uma doença impedir que o aluno frequente as aulas por um período inferior ou igual a três dias úteis. Se a doença determinar um impedimento de assiduidade superior a três dias úteis, deve ser apresentada uma justificação médica. Tratando-se de uma doença de carácter crónico ou recorrente, basta entregar uma declaração por ano letivo.
            </p>
            <p>
              2. Transporte --- em caso do transporte do aluno(a) faltar ou ocorrer algum defeito no veiculo impedindo a vinda do aluno(a).
            </p>
            <p>
              3. Isolamento profilático --- Determinado por doença infetocontagiosa de pessoa que viva com o aluno, comprovada através de uma declaração da autoridade sanitária competente.
            </p>
            <p>

              4. Morte de um familiar ---
              Durante o período legal de justificação de faltas por falecimento de familiar previsto no regime do contrato de trabalho dos trabalhadores que exercem funções públicas;
            </p>
            <p>
              5. Nascimento de irmão ---
              Durante o dia do nascimento e o dia imediatamente posterior.
            </p>
            <p>
              6. Tratamento ambulatório ---
              Em virtude de doença, ou deficiência, e que não possa efetuar-se fora do período das aulas.
            </p>
            <p>
              7. Assistência na doença a familiar ---
              Assistência na doença a membro do agregado familiar, nos casos em que, comprovadamente, não possa ser prestada por outra pessoa.
            </p>
            <p>
              8. Gravidez ---
              Comparência a consultas pré-natais, período de parto e amamentação, nos termos da legislação em vigor.
            </p>
            <p>
              9. Religião ---
              Ato decorrente da religião professada pelo aluno. Isto, desde que não possa efetuar-se fora do período das aulas e seja uma prática comummente reconhecida dessa religião.
            </p>
            <p>
              10. Cultura ---
              Participação em atividades culturais, associativas e desportivas reconhecidas, nos termos da lei, como de interesse público ou consideradas relevantes pelas respetivas autoridades escolares.
            </p>
            <p>
              11. Desporto de alta competição ---
              Preparação e participação em atividades desportivas de alta competição, nos termos legais aplicáveis.
            </p>
            <p>
              12. Obrigações legais ---
              Cumprimento de obrigações legais que não possam efetuar-se fora do período das aulas.
            </p>
            <p>
              13. Facto impeditivo aceitável ---
              Outro facto impeditivo da presença na escola ou em qualquer atividade escolar, desde que, comprovadamente, não seja imputável ao aluno e considerado aceitável pelo diretor, pelo diretor de turma ou pelo professor titular.
            </p>
            <p>
              14. Suspensão preventiva ---
              Aplicada no âmbito de procedimento disciplinar se não for aplicada qualquer medida disciplinar sancionatória ou se for aplicada uma medida disciplinar que não implique a suspensão da escola.
            </p>
            <p>
              15. Visitas de estudo ---
              Participação em visitas de estudo previstas no plano de atividades da escola, relativamente às disciplinas ou áreas disciplinares não envolvidas na referida visita.
            </p>

          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Fechar
        </button>

      </div>
    </div>
  </div>
</div>
<div class="demo-inline-spacing">

  <script src="<?= base_url('/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>"></script>
  <script>
    //tooltip ativador
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

    //tooltip ativador\\

    $(document).ready(function() {


      // editar justificativa
      // get Edit Product
      $('.btn-edit').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const category = $(this).data('category_id');

        // Set data to Form Edit
        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.product_category').val(category).trigger('change');

        // Call Modal Edit
        $('#editModal').modal('show');
      });



      // ver justificativa
      $('.btn-look').on('click', function() {

        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const admin_check = $(this).data('admin_check');
        const category = $(this).data('category_id');
        const imagem = $(this).data('imagem');



        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.visualizado_por').val(admin_check);
        $('#imagemlook').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);

        $('.product_category').val(category).trigger('change');


        $('#modalLook').modal('show');
      });



      // ver justificativa sem imagem
      $('.btn-look-noImage').on('click', function() {

        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const admin_check = $(this).data('admin_check');
        const category = $(this).data('category_id');
        const imagem = $(this).data('imagem');



        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.visualizado_por').val(admin_check);
        $('#imagemlook').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);

        $('.product_category').val(category).trigger('change');


        $('#modalLookNoImage').modal('show');
      });



      // excluir justificativa
      // get Delete Product
      $('.btn-delete').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.productID').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
      });



      // get finished Product
      $('.btn-finished').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.productID').val(id);
        // Call Modal Edit
        $('#finishedModal').modal('show');
      });


      // get finished Product
      $('.btn-finished-negate').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.productID').val(id);
        // Call Modal Edit
        $('#finishedModalNegate').modal('show');
      });

    });








    const justificativas = document.getElementById("justificativas");



    justificativas.classList = "menu-item active open";






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
    var finalizado = document.getElementById("finalizado");
    const finalizados = document.querySelectorAll(".finalizado").length;
    const atualizar = document.getElementById("atualizar");
    const datetime_created = document.getElementById("datetime_created");
    const te = document.querySelector(".te");

    const lista = document.querySelector(".lista");
    const edit = document.querySelector(".edit");


    salvar.addEventListener('click', tempo);
    salvar.addEventListener('click', invalid);
    atualizar.addEventListener('click', invalidEdit);




    function tempo() {
      datetime_created.value = "<?= date('Y/m/d H:i:s') ?>";

    }



    function invalid() {

      te.classList.add('invalido');


      setTimeout(() => {

        te.classList.remove('invalido');

      }, 350);


    }


    function invalidEdit() {

      edit.classList.add('invalido');


      setTimeout(() => {



        edit.classList.remove('invalido');

      }, 350);


    }
  </script>

  <?= $this->endSection() ?>