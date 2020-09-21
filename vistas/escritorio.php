<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

   $fecha=date("Y-m-d"); 
   $fecha1=$fecha.' '.'00:00:00';
   $fecha2=$fecha.' '.'23:59:00';
require 'header.php';
require_once "../config/Conexion.php";
if ($_SESSION['escritorio']==1) {

  
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Detalle Ventas del Dia</h1>
  <div class="box-tools pull-right">
  </div>
</div>
<!--box-header-->
<!--centro-->
</div>
<br>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="small-box bg-red">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$ 
        <?php
        require_once "../config/Conexion.php";
        $orden=mysqli_query($conexion,"SELECT sum(`total_venta`) as total FROM `venta` WHERE `fecha_hora`>='$fecha1' and `fecha_hora`<='$fecha2' and `estado`='Aceptado'");
    $numero= mysqli_fetch_row($orden);
    $total=$numero[0]; 
    echo $total; ?> </strong>
      </h4>
      <h4>Venta Total</h4>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  
  </div>
</div>



<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="small-box bg-green">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$ <?php 
        require_once "../config/Conexion.php";
        $orden=mysqli_query($conexion,"SELECT sum(precio_venta*cantidad) as total FROM `venta` v inner join detalle_venta dv on v.idventa=dv.idventa inner join articulo ar on ar.idarticulo=dv.idarticulo WHERE `fecha_hora`>='$fecha1' and `fecha_hora`<='$fecha2' and `estado`='Aceptado'  and ar.idcategoria=26");
    $numero= mysqli_fetch_row($orden);
    $servicios=$numero[0];  
    echo $servicios;
    ?> </strong>
      </h4>
      <h4>Servicios</h4>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="small-box bg-yellow">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$ <?php 
        require_once "../config/Conexion.php";
        $orden=mysqli_query($conexion,"SELECT sum(precio_venta) as total FROM `venta` v inner join detalle_venta dv on v.idventa=dv.idventa inner join articulo ar on ar.idarticulo=dv.idarticulo WHERE `fecha_hora`>='$fecha1' and `fecha_hora`<='$fecha2' and `estado`='Aceptado'  and ar.idcategoria=32");
    $numero= mysqli_fetch_row($orden);
    $Alquiler=$numero[0];  
    echo $Alquiler;
    ?> </strong>
      </h4>
      <h4>Alquileres</h4>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="small-box bg-purple">
    <div class="inner">
      <h4 style="font-size: 17px;">
        <strong>$ <?php 
    $Alquiler=$numero[0];  
        $productos=$total-$servicios-$Alquiler;
        echo $productos;
        ?> </strong>
      </h4>
      <h4>Productos</h4>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    
  </div>
</div>



</div>
<div class="panel-body">


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


 <?php 
}

ob_end_flush();
  ?>

