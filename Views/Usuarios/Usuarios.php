<?php
  headerAdmin($data);
  getModal('modalUsuarios', $data);
  ?>
<!--Plantilla Roles-->
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
        <?php if($_SESSION['permisosMod']['w']){ ?>
        <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i>
          Nuevo
        </button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <!--Inicio datatable roles-->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableUsuarios" style="width:100%">
              <thead>
              <tr>
                <th>ID</th>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>Carlos</td>
                <td>Hernandez</td>
                <td>ch@info.com</td>
                <td>3124508540</td>
                <td>Gerente</td>
                <td>Activo</td>
                <td></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  Fin datatable roles-->
</main>
<?php footerAdmin($data); ?>
