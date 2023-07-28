<?= $this->extend('usuario_layout') ?>

<?= $this->section('usuarios_layout') ?>


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



  .titulo {
    font-family: 'Poppins';
    text-shadow: 1px 1px #7DE5ED;
  }


  .excluir {
    padding-left: 13px;
    padding-right: 13px;
  }


  .editar {
    padding-left: 12px;
    padding-right: 12px;
  }


  .olhar {
    padding-left: 11.6px;
    padding-right: 11.6px;
  }

  .excluido {
    padding-left: 14.3px;
    padding-right: 14.3px;
  }



  #imagem {
    border-radius: 5px;
    
  }


  #imagemEdit {
    border-radius: 5px;
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    border: 2px solid #D3D3D3;
  }



  #imagemlook {
    border-radius: 5px;
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    border: 2px solid #D3D3D3;
  }



  #imagemlookNoComment {
    border-radius: 5px;
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    border: 2px solid #D3D3D3;
  }

  @media(orientation:landscape) {

    .infoMobile {
      display: none;
    }
  }


  @media(orientation:portrait) {

    th:nth-child(1),
    td:nth-child(1) {
      display: none;
    }

    th:nth-child(2),
    td:nth-child(2) {
      display: none;
    }

    th:nth-child(3),
    td:nth-child(3) {
      display: none;
    }


    .ajuda {
      display: none;

    }






  }
</style>



<div class="container mt-3">

  <h3 class="text-center titulo">JUSTIFICATIVAS</h3>

  <nav class="navbar navbar-example navbar-expand-lg ">



    <div class="d-flex  navbar-collapse" id="navbar-ex-4 ">
      <div class="d-flex navbar-nav me-auto">
        <button type="button" class="btn btn-success mb-2 me-2 " data-toggle="modal" data-target="#addModal"><i class="fa-solid fa-plus" style="transform:translateX(-10px);"></i>Criar Novo</button>

        <button type="button" class="btn btn-primary mb-2 me-5 ajuda" id="ajuda" data-bs-toggle="modal" data-bs-target="#modalScrollable">
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

  <?php if (count($usuarios) == 0) : ?>

    <p class="text-center">Não existem justificativas.</p>

  <?php else : ?>
    <div class="card table-responsive">
      <table class="table table-striped table-hover">
        <thead style="background: linear-gradient(#2196f3, #00FFFF);">
          <tr>
            <th style="color: white;">Aluno</th>
            <th style="color: white;">Motivo da falta</th>
            <th style="color: white;">Turma</th>
            <th style="color: white;">Data de envio</th>
            <th style="color: white;">Visualizado</th>
            <th style="color: white;" class="text-center">Status</th>
            <th style="color: white;">Ações</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($product as $row) : ?>
            <?php if ($row->product_name == $usuario) : ?>

              <tr class="lista">
                <td><?= $row->product_name; ?></td>
                <td><?= $row->product_price; ?></td>
                <td><?= $row->category_name; ?></td>
                <td><?= $row->datetime_created; ?></td>


                <?php if (empty($row->finished)) : ?>
                  <td id="finalizado" class="finalizado">Não visualizado</td>


                <?php else : ?>
                  <td id="finalizado" class="finalizado"><?= $row->finished; ?></td>
                <?php endif; ?>



                <?php if (empty($row->status)) : ?>
                  <td class="text-center"><span class="badge bg-label-primary me-1 ">em espera</span></td>


                <?php elseif ($row->status == "finalizado") : ?>


                  <td class="text-center"><span class="badge bg-label-success me-1">Aceito</span></td>

                <?php elseif ($row->status == "recusado") : ?>

                  <td class="text-center"><span class="badge bg-label-danger me-1">Recusado</span></td>


                <?php endif; ?>


                <td style="display:none;" id="status"><?= $row->status; ?></td>


                <td>



                  <?php if (empty($row->finished)) : ?>


                    <?php if (empty($row->imagem)) : ?>

                      <a href="#" data-toggle="tooltip" title="Editar" class="btn btn-info btn-sm btn-edit-noImage editar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-pen"></i></a>

                    <?php else : ?>

                      <a href="#" data-toggle="tooltip" title="Editar" class="btn btn-info btn-sm btn-edit editar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-pen"></i></a>

                    <?php endif; ?>

                    <a href="#" data-toggle="tooltip" title="Excluir" class="btn btn-danger btn-sm btn-delete excluir" style="margin: 1px;" data-id="<?= $row->product_id; ?>" data-imagem="<?= $row->imagem; ?>"><i class="fa-solid fa-trash"></i></a>


                  <?php else : ?>



                    <?php if (empty($row->imagem)) : ?>

                      <?php if (empty($row->comentario_adm)) : ?>

                        <a href="#" data-toggle="tooltip" title="Visualizar" class="btn btn-warning btn-sm btn-look-noImage-noComment olhar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>" data-comentario="<?= $row->comentario_adm; ?>"><i class="fa-solid fa-eye"></i></a>

                      <?php else : ?>


                        <a href="#" data-toggle="tooltip" title="Visualizar" class="btn btn-warning btn-sm btn-look-noImage olhar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>" data-comentario="<?= $row->comentario_adm; ?>"><i class="fa-solid fa-eye"></i></a>

                      <?php endif; ?>



                    <?php else : ?>

                      <?php if (empty($row->comentario_adm)) : ?>

                        <a href="#" data-toggle="tooltip" title="Visualizar" class="btn btn-warning btn-sm btn-look-noComment olhar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>" data-comentario="<?= $row->comentario_adm; ?>"><i class="fa-solid fa-eye"></i></a>

                      <?php else : ?>

                        <a href="#" data-toggle="tooltip" title="Visualizar" class="btn btn-warning btn-sm btn-look olhar" style="margin: 1px;" data-complement="<?= $row->complemento; ?>" data-id="<?= $row->product_id; ?>" data-Admin_check="<?= $row->visualizado_por; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>" data-imagem="<?= $row->imagem; ?>" data-comentario="<?= $row->comentario_adm; ?>"><i class="fa-solid fa-eye"></i></a>

                      <?php endif; ?>

                    <?php endif; ?>

                  <?php endif; ?>






              </tr>




            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<!-- Modal Add Product-->
<form action="<?= base_url('/product/saveOfUser') ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade te" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Justifique a falta</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">







          <div class="mt-1">
            <label for="exampleFormControlSelect1">Motivo</label>
            <select class="form-select" id="exampleFormControlSelect1" required name="product_price" aria-label="Default select example">
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

            <input type="hidden" value="" name="datetime_created" id="datetime_created">
          </div>

          <div class="form-group  mt-3">
            <label>Turma</label>
            <select name="product_category" class="form-select" required id="turmas">
              <option value="" style="background: #B2B2B2; color: #3C4048;">-Selecione a turma-</option>
              <?php foreach ($category as $row) : ?>
                <option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mt-3">
            <label for="formFile">Atestado</label>
            <input class="form-control" type="file" id="formFile" name="imagem" />
          </div>



          <div class="form-group  mt-3">
            <label for="complemento">Complemento</label>
            <textarea type="text" maxlength="500" class="form-control" id="complemento" rows="3" name="complemento" required></textarea>
          </div>




          <input type="hidden" class="form-control " readonly name="product_name" placeholder="Nome do Aluno" value="<?= $usuario ?>" required>

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
<form action="<?= base_url('/product/updateOfUser') ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade edit" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Justificativa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">


          <input type="hidden" class="form-control product_name" readonly name="product_name" required placeholder="Nome do Aluno">



          <div class="mt-1">
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

            <input type="hidden" value="" name="datetime_created" id="datetime_created_edit">
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





          <input class="form-control imagemAntiga" type="hidden" id="formFile" name="imagemAntiga" required />





          <div class="form-group mt-3">
            <label for="complementoModal">Complemento</label>
            <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" value="" rows="3" required></textarea>
          </div>


          <div class="mt-3">
            <label for="formFile">Atestado</label>
            <input class="form-control imagem" type="file" id="formFile" name="imagem" />
          </div>


          <div class="form-group mt-3">
            <label for="imagemlook">Comprovante atual</label>
            <br>
            <img src="" alt="" id="imagemEdit" data-bs-toggle="modal" data-bs-target="#imageModal">
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







<!-- Modal Edit Product/sem imagem-->
<form action="<?= base_url('/product/updateOfUser') ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade edit" id="editModalNoImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Justificativa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">


          <input type="hidden" class="form-control product_name" readonly name="product_name" required placeholder="Nome do Aluno">



          <div class="mt-1">
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

            <input type="hidden" value="" name="datetime_created" id="datetime_created_edit">
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


          <div class="mt-3">
            <label for="formFile">Atestado</label>
            <input class="form-control imagem" type="file" id="formFile" name="imagem" />
          </div>


          <input class="form-control imagemAntiga" type="hidden" id="formFile" name="imagemAntiga" required />





          <div class="form-group mt-3">
            <label for="complementoModal">Complemento</label>
            <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" value="" rows="3" required></textarea>
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
<!-- End Modal Edit Product/sem imagem-->








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



        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" value="" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>



        <div class="form-group mt-3">
          <label>Administrador que visualizou</label>

          <input type="text" class="form-control visualizado_por" name="visualizado_por" required placeholder="Administrador que visualizou" disabled>
        </div>


        <div class="form-group mt-3">
          <label for="comentario">Comentario do Administrador</label>
          <textarea type="text" maxlength="500" class="comentario form-control" id="comentario" name="comentario_adm" disabled rows="3"></textarea>
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




<!-- Modal Look Product/sem comentario-->

<div class="modal fade" id="modalLookNoComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" value="" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>



        <div class="form-group mt-3">
          <label>Administrador que visualizou</label>

          <input type="text" class="form-control visualizado_por" name="visualizado_por" required placeholder="Administrador que visualizou" disabled>
        </div>






        <div class="form-group mt-3">
          <label for="imagemlook">Atestado</label>
          <br>
          <img src="" alt="" id="imagemlookNoComment" data-bs-toggle="modal" data-bs-target="#imageModal">
        </div>


      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_id" class="product_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

<!-- End Modal Look Product/sem comentario-->








<!-- Modal Look Product/sem imagem/com comentario-->

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




        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>




        <div class="form-group mt-3">
          <label>Administrador que visualizou</label>
          <input type="text" class="form-control visualizado_por" name="visualizado_por" required placeholder="Administrador que visualizou" disabled>
        </div>



        <div class="form-group mt-3">
          <label for="comentario">Comentario do Administrador</label>
          <textarea type="text" maxlength="500" value="" class="comentario form-control" id="comentario" name="comentario_adm" disabled rows="3"></textarea>
        </div>




      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_id" class="product_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

<!-- End Modal Look Product/sem imagem/com comentario-->






<!-- Modal Look Product/sem imagem/sem comentario-->

<div class="modal fade" id="modalLookNoImageNoComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




        <div class="form-group mt-3">
          <label for="complementoModal">Complemento</label>
          <textarea type="text" maxlength="500" class="complemento form-control" id="complementoModal" name="complemento" disabled rows="3"></textarea>
        </div>




        <div class="form-group mt-3">
          <label>Administrador que visualizou</label>
          <input type="text" class="form-control visualizado_por" name="visualizado_por" required placeholder="Administrador que visualizou" disabled>
        </div>





      </div>
      <div class="modal-footer">
        <input type="hidden" name="product_id" class="product_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

<!-- End Modal Look Product/sem imagem/sem comentario-->





<!-- Modal Delete Product-->
<form action="<?= base_url('/product/deleteOfUser') ?>" method="post" enctype="multipart/form-data">
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
          <input class="form-control imagemAntigaDelet" type="hidden" id="formFile" name="imagemAntigaDelet" required />
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
          <h5 class="modal-title" id="exampleModalLabel">Marcar como visualizado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
        </div>
        <div class="modal-body">

          <h4>deseja mesmo confirma a justificativa?</h4>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="product_id" class="productID">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-primary">Sim</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal finaliza Product-->






<!-- Modal -->
<div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
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




<!-- Modal -->
<div class="modal fade" id="modalInfoMobile" tabindex="-1" aria-hidden="true">
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


  <input type="hidden" id="usuarioturma" value="<?= $usuarioturma ?>">

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
        const imagem = $(this).data('imagem');
        const category = $(this).data('category_id');

        // Set data to Form Edit
        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.imagemAntiga').val(imagem);
        $('#imagemEdit').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');

        // Call Modal Edit
        $('#editModal').modal('show');
      });





      // get Edit Product
      $('.btn-edit-noImage').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const imagem = $(this).data('imagem');
        const category = $(this).data('category_id');

        // Set data to Form Edit
        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.imagemAntiga').val(imagem);
        $('#imagemEdit').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');

        // Call Modal Edit
        $('#editModalNoImage').modal('show');
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
        const comentario = $(this).data('comentario');


        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.comentario').val(comentario);
        $('.visualizado_por').val(admin_check);
        $('#imagemlook').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');


        $('#modalLook').modal('show');
      });





      // ver justificativa
      $('.btn-look-noImage').on('click', function() {

        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const admin_check = $(this).data('admin_check');
        const category = $(this).data('category_id');
        const imagem = $(this).data('imagem');
        const comentario = $(this).data('comentario');


        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.comentario').val(comentario);
        $('.visualizado_por').val(admin_check);
        $('#imagemlook').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');


        $('#modalLookNoImage').modal('show');
      });



      // ver justificativa
      $('.btn-look-noImage-noComment').on('click', function() {

        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const admin_check = $(this).data('admin_check');
        const category = $(this).data('category_id');
        const imagem = $(this).data('imagem');
        const comentario = $(this).data('comentario');


        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.comentario').val(comentario);
        $('.visualizado_por').val(admin_check);
        $('#imagemlook').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');


        $('#modalLookNoImageNoComment').modal('show');
      });



      // ver justificativa
      $('.btn-look-noComment').on('click', function() {

        const id = $(this).data('id');
        const name = $(this).data('name');
        const price = $(this).data('price');
        const complement = $(this).data('complement');
        const admin_check = $(this).data('admin_check');
        const category = $(this).data('category_id');
        const imagem = $(this).data('imagem');
        const comentario = $(this).data('comentario');


        $('.product_id').val(id);
        $('.product_name').val(name);
        $('.product_price').val(price);
        $('.complemento').val(complement);
        $('.comentario').val(comentario);
        $('.visualizado_por').val(admin_check);
        $('#imagemlookNoComment').attr("src", "<?= base_url('assets/uploads/') ?>/" + imagem);
        $('.product_category').val(category).trigger('change');


        $('#modalLookNoComment').modal('show');
      });




      // excluir justificativa
      // get Delete Product
      $('.btn-delete').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const imagem = $(this).data('imagem');
        // Set data to Form Edit
        $('.productID').val(id);
        $('.imagemAntigaDelet').val(imagem);
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

    const usuarioturma = document.getElementById("usuarioturma");
    const atualizar = document.getElementById("atualizar");
    const datetime_created = document.getElementById("datetime_created");
    const datetime_created_edit = document.getElementById("datetime_created_edit");
    const te = document.querySelector(".te");
    const ajuda = document.querySelector(".ajuda");
    const edit = document.querySelector(".edit");
    const comentarios = document.querySelectorAll("#comentario");


    //    var value = document.getElementById('comentario').value;
    //  if (value.length < 1) {

    //     comentarios[0].style.color = "red";
    //     comentarios[0].style.display = "none";

    //     comentarios[1].style.color = "red";
    //     comentarios[1].style.display = "none";

    //   }


    salvar.addEventListener('click', tempo);
    atualizar.addEventListener('click', tempo_edit);

    salvar.addEventListener('click', invalid);
    atualizar.addEventListener('click', invalidEdit);




    function tempo() {
      datetime_created.value = "<?= date('Y/m/d H:i:s') ?>";

    }


    function tempo_edit() {
      datetime_created_edit.value = "<?= date('Y/m/d H:i:s') ?>";

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


    //verificacao de turma
    if (usuarioturma.value == "1° Ano - Turma A") {
      var turmanome = 1;
    } else if (usuarioturma.value == "1° Ano - Turma B") {
      var turmanome = 2;
    } else if (usuarioturma.value == "1° Ano - Turma C") {
      var turmanome = 3;
    } else if (usuarioturma.value == "1° Ano - Turma D") {
      var turmanome = 4;
    } else if (usuarioturma.value == "2° Ano - Turma A") {
      var turmanome = 5;
    } else if (usuarioturma.value == "2° Ano - Turma B") {
      var turmanome = 6;
    } else if (usuarioturma.value == "2° Ano - Turma C") {
      var turmanome = 7;
    } else if (usuarioturma.value == "2° Ano - Turma D") {
      var turmanome = 8;
    } else if (usuarioturma.value == "3° Ano - Turma A") {
      var turmanome = 9;
    } else if (usuarioturma.value == "3° Ano - Turma B") {
      var turmanome = 10;
    } else if (usuarioturma.value == "3° Ano - Turma C") {
      var turmanome = 11;
    } else if (usuarioturma.value == "3° Ano - Turma D") {
      var turmanome = 12;
    }

    document.getElementById('turmas').value = turmanome;


    document.getElementById('config').style.display = "none";


    //media com js

    /*
    function mediaQuery(x) {
      if (x.matches) { // If media query matches
        ajuda.innerHTML = "ajuda";
      } else {
        ajuda.innerHTML = "ajuda";
      }
    }

    var x = window.matchMedia("(orientation: portrait)")
    mediaQuery(x) // Call listener function at run time
    x.addListener(mediaQuery) // Attach listener function on state changes

    */
    const lista = document.querySelector(".lista");
  </script>

  <?= $this->endSection() ?>