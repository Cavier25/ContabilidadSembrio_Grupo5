<!-- Modal -->
<div class="modal fade" id="modalFormContabilidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Contabilidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formContabilidad" name="formContabilidad">
              <input type="hidden" id="idContabilidad" name="idContabilidad" value="">
              <div class="form-group">
                <label class="control-label">Nombre Contabilidad</label>
                <input class="form-control" id="txtnombreContabilidad" name="txtnombreContabilidad" type="text" placeholder="Nombre de la Contabilidad">
              </div>

              <div class="form-group">
                <label class="control-label">Fecha de inicio</label>
                <input class="form-control" type="date" id="datefinicio" name="datefinicio" > 
              </div>
              <div class="form-group">
                <label class="control-label">Posible Fecha final</label>
                <input class="form-control" type="date" id="dateffinal" name="dateffinal" > 
              </div>
              <div class="form-group">
                <label class="control-label">Descripcion</label>
                <textarea class="form-control"  id="descripcion" name="descripcion" rows="2" placeholder="descripcion"> </textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="liststatus" name="liststatus" required="">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" type= "submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                  <spam id="btnText">Guardar</spam>
                </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal vista-->
<div class="modal fade" id="modalViewContabilidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la Contabilidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celId"></td>
            </tr>
            <tr>
              <td>Nombre Contabilidad:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>fecha_inicio:</td>
              <td id="celFinicio"></td>
            </tr>
            <tr>
              <td>posible fecha final:</td>
              <td id="celFfinal"></td>
            </tr>
            <tr>
              <td>descripcion:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Status:</td>
              <td id="celStatus"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal ingesos-->
<div class="modal fade" id="modalFormIngresos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Ingresos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formIngresos" name="formIngresos">
              <input type="hidden" id="idIngresosIg" name="idIngresosIg" value="">
              <div class="form-group">
                <label class="control-label">Producto</label>
                <input class="form-control" id="txtproductoIg" name="txtproductoIg" type="text" placeholder="Nombre del producto">
              </div>
              <div class="form-group">
                <label class="control-label">Cantidad</label>
                <input class="form-control" id="intcantidadIg" name="intcantidadIg" type="number" placeholder="Cantidad">
              </div>
              <div class="form-group">
                <label class="control-label">Precio</label>
                <input class="form-control" id="intprecioIg" name="intprecioIg" type="number" placeholder="Precio">
              </div>
              <div class="form-group">
                <label class="control-label">Descripcion</label>
                <textarea class="form-control"  id="descripcionIg" name="descripcionIg" rows="2" placeholder="descripcion"> </textarea>
              </div>
              <input type="hidden" id="idConSembrios" name="idIngresos" value="idConSembrios">
              <div class="tile-footer">
                <button id="btnActionForm" type= "submit" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                  <spam id="btnText">Guardar</spam>
                </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal vista Ingreso-->
<div class="modal fade" id="modalViewIngreso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de los Ingresos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celIdingreso"></td>
            </tr>
            <tr>
              <td>Nombre Producto:</td>
              <td id="celNombreIngreso"></td>
            </tr>
            <tr>
              <td>Cantidad:</td>
              <td id="celCantidadI"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecioI"></td>
            </tr>
            <tr>
              <td>descripcion:</td>
              <td id="celDescripcionnI"></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Egesos-->
<div class="modal fade" id="modalFormEgresos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Egresos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formEgresos" name="formEgresos">
              <input type="hidden" id="idEgresosEg" name="idEgresosEg" value="">
              <div class="form-group">
                <label class="control-label">Producto</label>
                <input class="form-control" id="txtproductoEg" name="txtproductoEg" type="text" placeholder="Nombre del producto">
              </div>
              <div class="form-group">
                <label class="control-label">Cantidad</label>
                <input class="form-control" id="intcantidadEg" name="intcantidadEg" type="number" placeholder="Cantidad">
              </div>
              <div class="form-group">
                <label class="control-label">Precio</label>
                <input class="form-control" id="intprecioEg" name="intprecioEg" type="number" placeholder="Precio">
              </div>
              <div class="form-group">
                <label class="control-label">Descripcion</label>
                <textarea class="form-control"  id="descripcionEg" name="descripcionEg" rows="2" placeholder="descripcion"> </textarea>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                  <spam id="btnText">Guardar</spam>
                </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal vista Egreso-->
<div class="modal fade" id="modalViewEgreso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de los egreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celIdegreso"></td>
            </tr>
            <tr>
              <td>Nombre Producto:</td>
              <td id="celNombreEgreso"></td>
            </tr>
            <tr>
              <td>Cantidad:</td>
              <td id="celCantidad"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio"></td>
            </tr>
            <tr>
              <td>descripcion:</td>
              <td id="celDescripcionn"></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>