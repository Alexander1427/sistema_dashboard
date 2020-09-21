 <?php 
if (strlen(session_id())<1) {
  session_start();

}
  ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>DESIT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="../public/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <!-- Morris chart --><!-- Daterange picker -->

 <link rel="icon" type="image/png" href="../public/images/desit_logo.ico"/>
<!-- DATATABLES-->
<link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
<link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="escritorio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DESIT</b> V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DESIT |</b> Ventas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">NAVEGACIÓM</span>
      </a>
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php  if ($_SESSION['almacen']==1) { ?>
           <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php 
              
                require '../config/config.php';

               
                            $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                             $total=mysqli_query($conexion,$query);
                            while($consulta=mysqli_fetch_array($total))
                             {
                                   echo  $consulta['total'];
                             }

                            }        ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes <?php 
               
                            $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                             $total=mysqli_query($conexion,$query);
                            while($consulta=mysqli_fetch_array($total))
                             {
                                   echo  $consulta['total'];
                             }

                                                 ?> Notificación</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
               
                            $query="SELECT * FROM `articulo` WHERE `stock`<=5";
                             $notifi=mysqli_query($conexion,$query);
                            while($consulta=mysqli_fetch_array($notifi))
                             {
                                   echo  " 
                               <li>
                    <a href='#'>
                      <i class='fa fa-warning text-yellow'></i> Se esta agotando el producto<br> ".$consulta['nombre']." <br>Cantidad actual: ".$consulta['stock']."<br> Codigo: ".$consulta['codigo']."
                    </a>
                  </li>
                                            ";
                             }   ?>
                 
                </ul>
              </li>
              <li class="footer"><a target="_blank" href="../reportes/rptarticulosbajos.php">View all</a></li>
              
            </ul>
          </li>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">

                <p>
                 
                <?php echo $_SESSION['nombre']; ?>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
               <!--    <a href="#" class="btn btn-default btn-flat">Perfil</a> -->
                </div>
                <div class="pull-left">
               <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

<br>
       <?php 
if ($_SESSION['escritorio']==1) {
  echo ' <li><a href="escritorio.php"><i class="fa  fa-dashboard (alias)"></i> <span>Escritorio</span></a>
        </li>';
}
        ?>
               <?php
                require '../config/config.php';
                                                
if ($_SESSION['almacen']==1) {
$query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
            $total=mysqli_query($conexion,$query);
            while($consulta=mysqli_fetch_array($total))
            {
                              
            $bodega="<small class='label pull-right bg-red'>".$consulta['total']."</small>";
            
                             }
  echo ' <li class="treeview">
          <a href="#">

           
            <i class="fa fa-laptop"></i> <span>Almacen </span>
            <span class="pull-right-container">'.
            $bodega.'
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Articulos</a></li>
            <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorias</a></li>
          </ul>
        </li>';
}
        ?>
               <?php 
if ($_SESSION['compras']==1) {
  echo ' <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
            <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
          </ul>
        </li>';
}
        ?>

<?php 
if ($_SESSION['vender']==1) {
  echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Vender</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="venta2.php"><i class="fa fa-circle-o"></i> Vender</a></li>
            <li><a href="vender.php"><i class="fa fa-circle-o"></i> Vender Codigo de Barra</a></li>
          </ul>
        </li>';
}
        ?>

                             <?php 
if ($_SESSION['acceso']==1) {
  echo '  <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
          </ul>
        </li>';
}
        ?>  
                                     <?php 
if ($_SESSION['consultac']==1) {
  echo '     <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="comprasfecha.php"><i class="fa fa-circle-o"></i>Compras por fechas</a></li>
          </ul>
        </li>';
}
        ?>  
              
                                                <?php 
if ($_SESSION['consultav']==1) {
  echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas Generales</a></li>
          <li><a href="cierre.php"><i class="fa fa-circle-o"></i> Ventas Diarias</a></li>
          </ul>
        </li>';
}
        ?>
      <?php 
if ($_SESSION['reportes']==1) {
  echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ventasfechacliente2.php"><i class="fa fa-circle-o"></i> Productos y Servicios</a></li>

          </ul>
        </li>';
}
        ?> 
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>