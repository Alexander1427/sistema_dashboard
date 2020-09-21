<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{


require 'header.php';

if ($_SESSION['consultav']==1) {

 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Detalle de Ventas (Empleado)</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-12">
    <label>Fecha Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" onclick="listar()"  value="<?php echo date("Y-m-d"); ?>">
  </div>
  <div class="form-group col-lg-1 col-md-1 col-sm-4 col-xs-12">
    <label>Hora Inicio</label>
    <select name="hora_inicio" id="hora_inicio" onclick="listar()" class="form-control selectpicker"   required>
      <option value="08:00:00">8 AM</option>
      <option value="09:00:00">9 AM</option>
      <option value="10:00:00">10 AM</option>
      <option value="11:00:00">11 AM</option>
      <option value="12:00:00">12 MD</option>
      <option value="13:00:00">1 PM</option>
      <option value="14:00:00">2 PM</option>
      <option value="15:00:00">3 PM</option>
      <option value="16:00:00">4 PM</option>
      <option value="17:00:00">5 PM</option>
      <option value="18:00:00">6 PM</option>
      <option value="19:00:00">7 PM</option>
      <option value="20:00:00">8 PM</option>
    </select>
  </div>
  <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-12">
    <label>Fecha Fin</label>
    <input type="date" class="form-control" name="fecha_fin" onclick="listar()" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
  </div>
  <div class="form-group col-lg-1 col-md-1 col-sm-4 col-xs-12">
    <label>Hora Final</label>
    <select name="hora_fin" id="hora_fin" onclick="listar()" class="form-control selectpicker"   required>
      <option value="09:00:00">9 AM</option>
      <option value="10:00:00">10 AM</option>
      <option value="11:00:00">11 AM</option>
      <option value="12:00:00">12 MD</option>
      <option value="13:00:00">1 PM</option>
      <option value="14:00:00">2 PM</option>
      <option value="15:00:00">3 PM</option>
      <option value="16:00:00">4 PM</option>
      <option value="17:00:00">5 PM</option>
      <option value="18:00:00">6 PM</option>
      <option value="19:00:00">7 PM</option>
      <option value="20:00:00">8 PM</option>
      <option value="21:00:00" selected="selected">9 PM</option >

    </select>
  </div>
  <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-12">
    <label>Detalle Busqueda</label>
    <select name="opcion" id="opcion" onclick="listar()" class="form-control selectpicker"  required>
      <option value="1">Todos </option>
      <option value="2">Empleado(a)</option>
    </select>
  </div>
  <div class="form-inline col-lg-# col-md-3 col-sm-4 col-xs-12">
    <label>Empleado</label>
    <select name="idcliente" id="idcliente" onclick="listar()" class="form-control selectpicker" data-live-search="true" required>
    </select>
    </div>
    <div class="form-inline col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <br>
    
  </div>
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Ticket</th>
      <th>Fecha</th>
      <th>Empleado</th>
      <th>Comprobante</th>
      <th>Número</th>
      <th>Total Ventas</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Ticket</th>
      <th>Fecha</th>
      <th>Empleado</th>
      <th>Comprobante</th>
      <th>Número</th>
      <th>Total Compra</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>

<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="scripts/empleadosventa4.js"></script>
 <?php 
}

ob_end_flush();
  ?>

