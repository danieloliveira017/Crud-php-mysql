
<?php
include_once "conexao.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class='container'>
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4>Lista de Usuário</h4>
            </div>
            <div>
            <div class="input-group mb-1">
</div>
            </div>
            <div>
            
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadastroModal">
             CADASTRAR
            </button>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
          <span id="dell"></span>
          <span class="listar-usuarios"></span>
</div>
</div>
</div>
</hr>
<!-- Modal forms -->
<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="cadastroUsuario">
          <span id="msg"></span>
          <div class="mb-3">
            <label for="nome" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome">
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">E-mail:</label>
            <input type="email" class="form-control"  name="email" id="email">
          </div>
          <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="usuariobtn" value="Salvar">
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal visualização-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Visualização</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <dl class="row">
  <dt class="col-sm-3">ID</dt>
  <dd class="col-sm-9"><span id="id-visu"></span></dd>
  <dt class="col-sm-3">Nome</dt>
  <dd class="col-sm-9"><span id="nome-visu"></span></dd>
  <dt class="col-sm-3">E-mail</dt>
  <dd class="col-sm-9"><span id="email-visu"></span></dd>
</dl>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal formsEDitar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="editarUsuario">
      <span id="msgEdit"></span>
          <input type="hidden" name="id" id="editid">
          <div class="mb-3">
            <label for="nomeEdit" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nomeEdit" value="">
          </div>
          <div class="mb-3">
            <label for="emailEdit" class="col-form-label">E-mail:</label>
            <input type="email" class="form-control"  name="email" id="emailEdit" value="">
          </div>
          <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="editarbtn" value="Editar">
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
   <script src="js/custon.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>