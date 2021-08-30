<?php headerAdmin($data); 
  getModal('modalContabilidad',$data);
?>
  <div id="contentAjax"></div>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-user-tag"></i> <?= $data['page_title']  ?>
          <?php if($_SESSION['permisosMod']['w']){ ?>
          <button class="btn btn-morado" type="button" onclick="openModal();"><i class="fas fa-plus"></i> Nuevo </button>
            <?php } ?>
        </h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url();?>/contabilidad"><?= $data['page_title']  ?></a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableContabilidad">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre de contabilidad</th>
                      <th>Fecha inicio</th>
                      <th>posible fecha final</th>
                      <th>Descripcion</th>
                      <th>Status</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- tabla Egresos-->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableEgresos">
                  <thead>
                    <tr>
                      <th>ID Egresos</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- tabla Ingresos-->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableIngresos">
                  <thead>
                    <tr>
                      <th>ID Ingresos</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php footerAdmin($data); ?>