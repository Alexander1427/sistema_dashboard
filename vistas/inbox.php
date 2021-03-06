
<?php 
if (strlen(session_id())<1) {
  session_start();

}
  ?><!DOCTYPE html>
<html lang="en">

<!-- Head tag -->

<head>
    <meta charset="utf-8" />
    <title>DESIT Whatsapp</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="DESIT" />
    <link rel="shortcut icon" href="../assets/img/logoicon.png">

    <!-- g fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
    <!-- g fonts style ends -->

    <!-- Vendor or 3rd party style -->

    <!-- material icons -->
    <link href="../assets/vendor/material-icons/material-icons.css" rel="stylesheet">
    <!-- flags icons -->
    <link href="../assets/vendor/flags/css/flag-icon.min.css" rel="stylesheet">
    <!-- daterange picker -->
    <link href="../assets/vendor/daterangepicker-master/daterangepicker.css" rel="stylesheet">

    <!-- Vendor or 3rd party style ends -->

    <!-- Customized template style mandatory -->
    <link href="../assets/css/style-darkblue-dark.css" rel="stylesheet" id="stylelink">
    <!-- Customized template style ends -->
</head>

<!-- Head tag ends -->

<!-- Body -->

<body class="sidemenu-open">
<div class="loader container-fluid">
        <div class="row h-100">
            <div class="col-auto align-self-center  mx-auto text-center">
                <div class="loader-ripple"><div></div><div></div></div>
                <h2>DESIT</h2>
                <p>PRODUCTOS </p>
            </div>
        </div>
    </div>

    <!-- Sidebar starts -->
    <div class="sidebar">
        <!-- Logo sidebar -->
        <a href="escritorio2.php" class="logo">
            <img src="../assets/img/logo_drogueriapng.png" alt="" class="logo-icon" height="60px">
            <div class="logo-text">
                <h5 class="fs22 mb-0"> <sup class="badge badge-success">PRO</sup></h5>
                <p class="text-uppercase fs11">SISTEM Dashboard</p>
            </div>
        </a>
        <!-- Logo sidebar ends -->

        <!-- Navigation menu sidebar-->
        <h6 class="subtitle fs11">TUS OPCIONES</h6>
        <ul class="nav flex-column">

        <?php
                require '../config/config.php';
                                                
if ($_SESSION['almacen']==1) {
$query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
            $total=mysqli_query($conexion,$query);
            while($consulta=mysqli_fetch_array($total))
            {
                              
            $bodega="<small class='label pull-right bg-red'>".$consulta['total']."</small>";
            
                             }
  echo '    <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">dashboard</i><span>Almacen</span> <i class="material-icons arrow">expand_more</i></a>
  <div class="nav flex-column">
      <div class="nav-item"><a class="nav-link" href="articulo2.php"><span>Articulos</span></a></div>
      <div class="nav-item"><a class="nav-link" href="categoria2.php"><span>Categorias</span></a></div>
  </div>
</li><li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">phone</i><span>Whatsapp</span> <i class="material-icons arrow">expand_more</i></a>
<div class="nav flex-column">
    <div class="nav-item"><a class="nav-link" href="inbox.php"><span>MENSAJES</span></a></div>
    
</div>
</li>';
}
        ?>


         
        </ul>
        <h6 class="subtitle fs11">COMPRAS</h6>

        <?php 
if ($_SESSION['compras']==1) {
  echo '
  <ul class="nav flex-column">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">games</i><span>COMPRAS</span> <i class="material-icons arrow">expand_more</i></a>
          <div class="nav flex-column">
          
              <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="ingreso2.php"><span>INGRESOS</span></a>
              
              </div>
              <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="proveedor2.php"><span>PROVEEDORES</span></a>
              </div>
              
          </div>
      </li>
  </ul>';
}
        ?>

<?php 
if ($_SESSION['vender']==1) {
  echo '     <ul class="nav flex-column">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">turned_in_not</i><span>VENTAS</span> <i class="material-icons arrow">expand_more</i></a>
      <div class="nav flex-column">
          <div class="nav-item"><a class="nav-link" href="#"><span>Venta con factura</span></a></div>
          <div class="nav-item"><a class="nav-link" href="#"><span>Venta Credito fiscal</span></a></div>
          <div class="nav-item"><a class="nav-link" href="venta2.php"><span>Venta Ticket</span></a></div>
          <div class="nav-item"><a class="nav-link" href="vender.php"><span>Venta con pistola</span></a></div>
         
      </div>
  </li>
</ul>';
}
        ?>
   

        <h6 class="subtitle fs11">Consultas</h6>

        <?php 
if ($_SESSION['acceso']==1) {
  echo '     <ul class="nav flex-column">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">library_books</i><span>Consultas Compras</span> <i class="material-icons arrow">expand_more</i></a>
      <div class="nav flex-column">
          <div class="nav-item"><a class="nav-link" href="comprasfecha2.php"><span>Consultas por fecha</span></a></div>

      </div>
  </li>
</ul>';
}
        ?>  
    
    <?php 
if ($_SESSION['consultac']==1) {
  echo '    <ul class="nav flex-column">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">library_books</i><span>Consultas Ventas</span> <i class="material-icons arrow">expand_more</i></a>
      <div class="nav flex-column">
      <div class="nav-item"><a class="nav-link" href="venta2.php"><span>Ventas generales</span></a></div>
          <div class="nav-item"><a class="nav-link" href="cierre2.php"><span>Ventas Diarias</span></a></div>

      </div>
  </li>
</ul>';
}
        ?>  
    

    <?php 
if ($_SESSION['consultav']==1) {
  echo '    <ul class="nav flex-column">
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">library_books</i><span>Reportes</span> <i class="material-icons arrow">expand_more</i></a>
  <div class="nav flex-column">
      <div class="nav-item"><a class="nav-link" href="informe.php"><span>Informes</span></a></div>

  </div>
</li>

</ul>';
}
        ?>
    
        <h6 class="subtitle fs11">Controles</h6>
 <!-- Setting link -->
        <?php 
if ($_SESSION['reportes']==1) {
  echo '        <ul class="nav flex-column">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)"><i class="material-icons icon">settings_applications</i><span>Configuraci??n</span> <i class="material-icons arrow">expand_more</i></a>
      <div class="nav flex-column">
          <div class="nav-item"><a class="nav-link" href="usuario.php"><span>Usuarios</span></a></div>
          <div class="nav-item"><a class="nav-link" href="permiso.php"><span>Permisos</span></a></div>

      </div>
  </li>
</ul>';
}
        ?> 
       

        <!-- Setting link -->
    </div>
    <!-- Sidebar ends -->

    <!-- wrapper starts -->
    <div class="wrapper">
        <div class="content shadow-sm">
            <div class="container-fluid header-container">
                <div class="row header">
                    <div class="container-fluid header-container">
                <div class="row header">
                    <div class="container-fluid " id="header-container">
                        <div class="row">
                            <!-- Header starts -->
                            <nav class="navbar col-12 navbar-expand ">
                                <button class="menu-btn btn btn-link btn-sm" type="button">
                                    <i class="material-icons">menu</i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- search starts -->
                                    <form class="form-inline search mr-auto">
                                        <input class="form-control form-control-sm" type="search" placeholder="Buscar" aria-label="Search">
                                        <button class="btn btn-link btn-sm" type="submit"><i class="material-icons">search</i></button>
                                    </form>
                                    <!-- search ends -->

                                    <!-- large desktop market rates starts -->
                                    <div class="mx-auto d-none d-xxl-inline">
                                        <div class="row mx-0">
                                            <div class="col-auto pr-0 align-self-center"><i class="material-icons vm">public</i></div>
                                            <div class="col-auto">
                                                <h5 class="fs15 font-weight-normal mb-0">Ventas <span class="text-danger mx-1"><i class="material-icons vm">arrow_drop_down</i></span>$ <?php 
              
              require '../config/config.php';

             
                          $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                           $total=mysqli_query($conexion,$query);
                          while($consulta=mysqli_fetch_array($total))
                           {
                                 echo  $consulta['total'];
                           }

                                  ?> </h5>
                                                <p class="fs11"><span>Live</span> <span class="text-danger">-0.1%</span> <span>$<?php 
              
              require '../config/config.php';

             
                          $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                           $total=mysqli_query($conexion,$query);
                          while($consulta=mysqli_fetch_array($total))
                           {
                                 echo  $consulta['total'];
                           }

                                  ?></span></p>
                                            </div>
                                            <div class="col-auto border-left-dashed">
                                                <h5 class="fs15 font-weight-normal mb-0">Actuales <span class="text-success mx-1"><i class="material-icons vm">arrow_drop_up</i></span>$ <?php 
              
              require '../config/config.php';

             
                          $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                           $total=mysqli_query($conexion,$query);
                          while($consulta=mysqli_fetch_array($total))
                           {
                                 echo  $consulta['total'];
                           }

                                  ?> </h5>
                                                <p class="fs11"><span>Live</span> <span class="text-success">+0.1%</span> <span>($ <?php 
              
              require '../config/config.php';

             
                          $query="SELECT COUNT(*) as total FROM `articulo` WHERE `stock`<=5";
                           $total=mysqli_query($conexion,$query);
                          while($consulta=mysqli_fetch_array($total))
                           {
                                 echo  $consulta['total'];
                           }

                                  ?> )</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- large desktop market rates ends -->

                                    <!-- icons dropwdowns starts -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- flag dropdown-->
                                        <li class="nav-item dropdown select-flag">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="flag-icon flag-icon-sv"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown0">
                                            <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-us"></span> <span class="ml-2">Ingles</span></a>
                                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-sv"></span> <span class="ml-2">Espa??ol</span></a>
                                             
                                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-za"></span> <span class="ml-2">Africano</span></a>
                                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-fr"></span> <span class="ml-2">Frances</span></a>
                                            </div>
                                        </li>

                                        <!-- applicatio quicklinks dropdown-->
                                        <!--li class="nav-item dropdown d-none d-sm-flex">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">apps</i>
                                            </a>
                                            <!--div class="dropdown-menu dropdown-menu-center no-defaults pt-0 overflow-hidden" aria-labelledby="navbarDropdown2">
                                                <div class="position-relative text-center rounded">
                                                    <div class="background">
                                                        <img src="../assets/img/background-part.png" alt="">
                                                    </div>
                                                    <div class="pt-4 pb-5 text-white">
                                                        <h5 class="font-weight-normal">Quick Access</h5>
                                                        <p>Get Quick access to your<br>favorite applications</p>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mx-0 top-60">
                                                    <div class="col-12 col-md-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="card border-0 shadow mb-3">
                                                                    <div class="card-body text-center">
                                                                        <i class="avatar avatar-40 material-icons text-template-primary my-3">favorite</i>
                                                                        <p>Dashboard</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card border-0 shadow mb-3">
                                                                    <div class="card-body text-center">
                                                                        <i class="avatar avatar-40 material-icons bg-light-warning text-warning my-3">style</i>
                                                                        <p>Sidebar</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card border-0 shadow mb-3">
                                                                    <div class="card-body text-center">
                                                                        <i class="avatar avatar-40 material-icons bg-light-danger text-danger my-3">library_books</i>
                                                                        <p>Pages</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card border-0 shadow mb-3">
                                                                    <div class="card-body text-center">
                                                                        <i class="avatar avatar-40 material-icons bg-light-success text-success my-3">poll</i>
                                                                        <p>Charts</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div-->
                                        </li-->

                                        <!-- cart dropdown-->
                                        <li class="nav-item dropdown d-none d-sm-flex">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">local_mall</i>
                                                <span class="counter-small bg-danger"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center no-defaults pt-0 overflow-hidden" aria-labelledby="navbarDropdown3">
                                                <div class="position-relative text-center rounded">
                                                    <div class="background h-150">
                                                        <img src="../assets/img/background-part.png" alt="">
                                                    </div>
                                                    <div class="pt-4 pb-5 text-white">
                                                        <h5 class="font-weight-normal">Ultimas ventas</h5>
                                                        <p>Revisa tu ultima venta</p>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mx-0 top-60 z-2">
                                                    <div class="col-12 mx-auto">
                                                        <ul class="list-group list-group-flush bg-white rounded shadow overflow-hidden mb-3">
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-auto pr-0 align-self-center">
                                                                        <figure class="product-image-small mb-0"><img src="../assets/img/image-4.png" alt="" class="vm"></figure>
                                                                    </div>
                                                                    <div class="col">
                                                                        <a href="#" class="text-dark mb-1 d-block">Computadora</a>
                                                                        <h6 class="text-success font-weight-normal mb-0">$ 120.00</h6>
                                                                        <a href="" class="text-danger">Remove</a>
                                                                    </div>
                                                                    <div class="col-auto align-self-center">
                                                                        <input type="text" class="form-control py-0 form-control-sm w-35" placeholder="" value="1">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-auto pr-0 align-self-center">
                                                                        <figure class="product-image-small mb-0"><img src="../assets/img/image-5.png" alt="" class="vm"></figure>
                                                                    </div>
                                                                    <div class="col">
                                                                        <a href="#" class="text-dark mb-1 d-block">Ventilador</a>
                                                                        <h6 class="text-success font-weight-normal mb-0">$ 120.00</h6>
                                                                        <a href="" class="text-danger">Remove</a>
                                                                    </div>
                                                                    <div class="col-auto align-self-center">
                                                                        <input type="text" class="form-control py-0 form-control-sm w-35" placeholder="" value="1">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-center">
                                                                <a href="">+5 more</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item border-top">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar avatar-30 material-icons text-template-primary">local_activity</span>
                                                        </div>
                                                        <div class="col px-0">
                                                            <div class="form-group mb-0 float-label active">
                                                                <input type="text" class="form-control form-control-sm" required="" placeholder="Coupan Code">
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="btn btn-primary btn-sm px-0 text-white"><i class="material-icons md-18">arrow_forward</i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item border-top">
                                                    <div class="row ">
                                                        <div class="col-4">
                                                            <p class="text-secondary mb-1 small">Sub Total</p>
                                                            <h6 class="mb-0">$540.00</h6>
                                                        </div>
                                                        <div class="col-4 px-0 text-center">
                                                            <p class="text-secondary mb-1 small">Tax</p>
                                                            <h6 class="mb-0">$40.00</h6>
                                                        </div>
                                                        <div class="col-4 text-right">
                                                            <p class="text-secondary mb-1 small">Discount</p>
                                                            <h6 class="mb-0">-$100.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item border-top text-center">
                                                    <p class="text-secondary my-1">Net Payable</p>
                                                    <h3 class="mb-0">$400.00</h3>
                                                    <a href="#" class="btn btn-primary text-white btn-block mt-3"><span>Ultima venta</span><i class="material-icons md-18">arrow_forward</i></a>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- task dropdown-->
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">view_day</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center no-defaults pt-0 overflow-hidden" aria-labelledby="navbarDropdown5">
                                                <div class="position-relative text-center rounded">
                                                    <div class="background">
                                                        <img src="../assets/img/background-part.png" alt="">
                                                    </div>
                                                    <div class="py-3 text-white">
                                                        <h5 class="font-weight-normal mb-3">Tareas</h5>
                                                        <div class="px-3">
                                                            <ul class="nav nav-pills tab-white nav-fill" id="tasks" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tareas</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Actividades</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Alertas</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content" id="tasksContent">
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                        <div class="scroll-y h-320 d-block">
                                                            <div class="dropdown-item status-border border-warning">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="checktask1">
                                                                            <label class="custom-control-label" for="checktask1"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">6:33 | Reuni??n</p>
                                                                        <p class="small text-mute">Reuni??n para integreci??n.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item status-border border-danger">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="checktask2">
                                                                            <label class="custom-control-label" for="checktask2"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">7:33 |Insertar datos</p>
                                                                        <p class="small text-mute">Tiene que insertar los datos del cliente.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item status-border border-warning">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="checktask3">
                                                                            <label class="custom-control-label" for="checktask3"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">8:00 | Trabajar en las pesta??as</p>
                                                                        <p class="small text-mute">Trabajar en las pesta??as de las ventanas</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item status-border border-success">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="checktask4">
                                                                            <label class="custom-control-label" for="checktask4"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">10:45 | Verificar el envio de datos</p>
                                                                        <p class="small text-mute mb-2">Equipo de verificaci??n.</p>
                                                                        <figure class="avatar avatar-20"><img src="../assets/img/user1.png" alt=""></figure>
                                                                        <figure class="avatar avatar-20"><img src="../assets/img/user2.png" alt=""></figure>
                                                                        <figure class="avatar avatar-20"><img src="../assets/img/user3.png" alt=""></figure>
                                                                        <figure class="avatar avatar-20">20+</figure>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item status-border border-primary">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="checktask5">
                                                                            <label class="custom-control-label" for="checktask5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">11:33 | Revisar cotizaciones</p>
                                                                        <p class="small text-mute">Revisar las cotizaciones del el cliente Juan.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item border-top">
                                                            <button class="btn btn-primary text-white btn-block mt-2"><span>Complete</span><i class="material-icons md-18">arrow_forward</i></button>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                        <div class="scroll-y h-320 d-block">
                                                            <a class="dropdown-item" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="timeline-circle-wrap">
                                                                            <div class="timeline-circle border-warning"><span class="bg-warning"></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">Reuni??n</p>
                                                                        <p class="small text-mute">Reuni??n finalizada</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="timeline-circle-wrap">
                                                                            <div class="timeline-circle border-danger"><span class="bg-danger"></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">Insertar datos</p>
                                                                        <p class="small text-mute mb-1">DESIT Team</p>
                                                                        <figure class="avatar avatar-30"><img src="../assets/img/user1.png" alt=""></figure>
                                                                        <figure class="avatar avatar-30"><img src="../assets/img/user2.png" alt=""></figure>
                                                                        <figure class="avatar avatar-30"><img src="../assets/img/user3.png" alt=""></figure>
                                                                        <figure class="avatar avatar-30"><img src="../assets/img/user4.png" alt=""></figure>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="timeline-circle-wrap">
                                                                            <div class="timeline-circle border-success"><span class="bg-success"></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">Final Cotizacion </p>
                                                                        <p class="small text-mute">Completa</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="timeline-circle-wrap">
                                                                            <div class="timeline-circle border-primary"><span class="bg-primary"></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">Vision y desarrollo</p>
                                                                        <p class="small text-mute">Completa</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="timeline-circle-wrap">
                                                                            <div class="timeline-circle border-info"><span class="bg-info"></span></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <p class="mb-0">Critical Bug resolved</p>
                                                                        <p class="small text-mute">Resuelto.</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                        <div class="scroll-y h-320 d-block">
                                                            <a class="dropdown-item border-top new" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <i class="material-icons text-template-primary">local_mall</i>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <p class="mb-0">Nueva orden</p>
                                                                            </div>
                                                                            <div class="col-auto pl-0">
                                                                                <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="small text-mute">Nuevo pedido.</p>
                                                                    </div>

                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item border-top " href="#">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <i class="material-icons text-template-primary">account_balance_wallet</i>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <p class="mb-0">Balance fue modificado</p>
                                                                            </div>
                                                                            <div class="col-auto pl-0">
                                                                                <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="small text-mute">Nuevo pedido.</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item border-top " href="#">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <i class="material-icons text-template-primary">account_circle</i>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <p class="mb-0">Nuevo cliente recibido</p>
                                                                            </div>
                                                                            <div class="col-auto pl-0">
                                                                                <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="small text-mute">Nuevo cliente</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item border-top" href="#">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <i class="material-icons text-template-primary">check_circle</i>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <p class="mb-0">Email Actualizado</p>
                                                                            </div>
                                                                            <div class="col-auto pl-0">
                                                                                <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="small text-mute">Tu correo fue actualizado</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item border-top " href="#">
                                                                <div class="row">
                                                                    <div class="col-auto align-self-center">
                                                                        <i class="material-icons text-template-primary">account_balance_wallet</i>
                                                                    </div>
                                                                    <div class="col pl-0">
                                                                        <div class="row mb-1">
                                                                            <div class="col">
                                                                                <p class="mb-0">Llamada perdida</p>
                                                                            </div>
                                                                            <div class="col-auto pl-0">
                                                                                <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="small text-mute">Llamada perdida de cliente.</p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- message dropdown-->
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">email</i>
                                                <span class="counter bg-danger">1</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-center no-defaults pt-0 overflow-hidden" aria-labelledby="navbarDropdown5">
                                                <div class="position-relative text-center rounded">
                                                    <div class="background">
                                                        <img src="../assets/img/background-part.png" alt="">
                                                    </div>
                                                    <div class="py-3 text-white">
                                                        <h5 class="font-weight-normal">Mensajes</h5>
                                                        <p>Actualizaciones de mensajes</p>
                                                    </div>

                                                </div>
                                                <div class="scroll-y h-320 d-block">
                                                    <a class="dropdown-item border-top new" href="#">
                                                        <div class="row">
                                                            <div class="col-auto align-self-center">
                                                                <i class="material-icons text-template-primary">local_mall</i>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <p class="mb-0">Nueva orden recibida</p>
                                                                    </div>
                                                                    <div class="col-auto pl-0">
                                                                        <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                    </div>
                                                                </div>
                                                                <p class="small text-mute">Orden de Anand Mhatva.</p>
                                                            </div>

                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item border-top " href="#">
                                                        <div class="row">
                                                            <div class="col-auto align-self-center">
                                                                <i class="material-icons text-template-primary">account_balance_wallet</i>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <p class="mb-0">Balance de ventas</p>
                                                                    </div>
                                                                    <div class="col-auto pl-0">
                                                                        <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                    </div>
                                                                </div>
                                                                <p class="small text-mute">.</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item border-top " href="#">
                                                        <div class="row">
                                                            <div class="col-auto align-self-center">
                                                                <i class="material-icons text-template-primary">account_circle</i>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <p class="mb-0">Nuevo Cliente</p>
                                                                    </div>
                                                                    <div class="col-auto pl-0">
                                                                        <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                    </div>
                                                                </div>
                                                                <p class="small text-mute">Nuevo cliente de  Australia</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item border-top" href="#">
                                                        <div class="row">
                                                            <div class="col-auto align-self-center">
                                                                <i class="material-icons text-template-primary">check_circle</i>
                                                            </div>
                                                            <div class="col pl-0">
                                                                <div class="row mb-1">
                                                                    <div class="col">
                                                                        <p class="mb-0">Email Actualizado</p>
                                                                    </div>
                                                                    <div class="col-auto pl-0">
                                                                        <p class="small text-mute text-trucated mt-1">2/12/2019</p>
                                                                    </div>
                                                                </div>
                                                                <p class="small text-mute">Tu cambio de correo fue exitoso</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    
                                                
                                                
                                                </div>
                                            </div>
                                        </li>

                                        <!-- profile dropdown-->
                                        <li class="nav-item dropdown ml-0 ml-sm-4">
                                            <a class="nav-link dropdown-toggle profile-link" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <figure class="rounded avatar avatar-30">
                                                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" alt="">
                                                </figure>
                                                <div class="username-text ml-2 mr-2 d-none d-lg-inline-block">
                                                    <h6 class="username"><span>Bienvenido,</span><?php echo $_SESSION['nombre']; ?></h6>
                                                </div>
                                                <figure class="rounded avatar avatar-30 d-none d-md-inline-block">
                                                    <i class="material-icons">expand_more</i>
                                                </figure>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right w-300 pt-0 overflow-hidden" aria-labelledby="navbarDropdown6">
                                                <div class="position-relative text-center rounded py-5">
                                                    <div class="background">
                                                        <img src="../assets/img/background-part.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-center mb-3 top-60 z-2">
                                                    <figure class="avatar avatar-120 mx-auto shadow"><img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" alt=""></figure>
                                                </div>
                                                <h5 class="text-center mb-0"><?php echo $_SESSION['nombre']; ?></h5>
                                                <p class="text-center">Administrador</p>
                                                <p class="text-center text-secondary fs13">San Salvador, El Salvador</p>
                                                <a class="dropdown-item border-top" href="usuario.php">
                                                    <div class="row">
                                                        <div class="col-auto align-self-center">
                                                            <i class="material-icons text-success">account_box</i>
                                                        </div>
                                                        <div class="col pl-0">
                                                            <p class="mb-0">Mi Perfil</p>
                                                            <p class="small text-mute text-trucated">Actualiza tus detalles y elimina usuarios</p>
                                                        </div>
                                                        <div class="col-auto align-self-center text-right pl-0">
                                                            <i class="material-icons text-mute small">chevron_right</i>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--a class="dropdown-item border-top" href="#">
                                                    <div class="row">
                                                        <div class="col-auto align-self-center">
                                                            <i class="material-icons text-info">account_balance_wallet</i>
                                                        </div>
                                                        <div class="col pl-0">
                                                            <p class="mb-0">My Wallet</p>
                                                            <p class="small text-mute text-trucated">Add Money or withdrow</p>
                                                        </div>
                                                        <div class="col-auto align-self-center text-right pl-0">
                                                            <i class="material-icons text-mute small">chevron_right</i>
                                                        </div>
                                                    </div>
                                                </a-->
                                                <!--a class="dropdown-item border-top" href="#">
                                                    <div class="row">
                                                        <div class="col-auto align-self-center">
                                                            <i class="material-icons text-warning">date_range</i>
                                                        </div>
                                                        <div class="col pl-0">
                                                            <p class="mb-0">My Schedule</p>
                                                            <p class="small text-mute text-trucated">Appointments and schedules</p>
                                                        </div>
                                                        <div class="col-auto align-self-center text-right pl-0">
                                                            <i class="material-icons text-mute small">chevron_right</i>
                                                        </div>
                                                    </div>
                                                </a-->
                                                <a class="dropdown-item border-top" href="../ajax/usuario.php?op=salir">
                                                    <div class="row">
                                                        <div class="col-auto align-self-center">
                                                            <i class="material-icons text-danger">exit_to_app</i>
                                                        </div>
                                                        
                                                        <div class="col pl-0">
                                                       <p class="mb-0 text-danger">Logout</p>
                                                        </div>
                                                        <div class="col-auto align-self-center text-right pl-0">
                                                            <i class="material-icons text-mute small text-danger">chevron_right</i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- icons dropwdowns starts -->
                                </div>
                            </nav>
                            <!-- Header ends -->
                        </div>
                    </div>
                </div>
                <div class="row submenu">
                    <div class="container-fluid " id="submenu-container">
                        <div class="row">
                            <!-- Submenu section starts -->
                            <!--nav class="navbar col-12 ">
                                <div class="dropdown mr-auto d-flex d-sm-none">
                                    <button class="btn dropdown-toggle btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dashboard
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Dashboard</a>
                                        <a class="dropdown-item" href="#">Featured</a>
                                        <a class="dropdown-item" href="#">popular</a>
                                    </div>
                                </div>
                                <ul class="nav nav-pills mr-auto d-none d-sm-flex">
                                    <li class="nav-item ">
                                        <a class="nav-link active" href="#">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">popular</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-pills ml-auto d-none d-xl-flex">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">This week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">This Month</a>
                                    </li>
                                </ul>
                                <form class="form-inline ml-auto ml-sm-3">
                                    <div id="daterangeadminux" class="form-control form-control-sm">
                                        <span></span> <i class="material-icons avatar avatar-26 text-template-primary cal-icon">event</i>
                                    </div>

                                </form>
                            </nav-->
                            <!-- Submenu section ends -->
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <!-- Main container starts -->
            <div class="container-fluid pt-0 main-container" id="main-container">
                <!-- inbox header --->
                <div class="row border-bottom mail-header">
                    <div class="col-12 col-md-6 col-xl-5 py-2">
                        <div class="custom-control custom-checkbox vm d-inline-block mr-3">
                            <input type="checkbox" class="custom-control-input" id="selectall">
                            <label class="custom-control-label" for="selectall"> All</label>
                        </div>
                        <div class="dropdown  d-inline-block">
                            <button class="btn btn-sm dropdown-toggle btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button">
                                <span class="material-icons">flag</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item status-border border-primary " href="#">Primary</a>
                                <a class="dropdown-item status-border border-secondary " href="#">Secondary</a>
                                <a class="dropdown-item status-border border-success " href="#">Important</a>
                                <a class="dropdown-item status-border border-warning " href="#">Warning</a>
                                <a class="dropdown-item status-border border-info " href="#">Minor</a>
                                <a class="dropdown-item status-border border-danger " href="#">Highly Important</a>
                            </div>
                        </div>
                        <form class="d-none d-inline-block search mr-auto">
                            <input class="form-control form-control-sm" type="search" placeholder="Search mail..." aria-label="Search">
                            <button class="btn btn-link btn-sm" type="submit"><i class="material-icons">search</i></button>
                        </form>

                    </div>
                    <div class="col d-none d-md-block border-left  py-2">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-sm btn-link" type="button">
                                    <span class="material-icons">delete</span>
                                </button>
                                <button class="btn btn-sm btn-link" type="button">
                                    <span class="material-icons">reply</span>
                                </button>
                                <button class="btn btn-sm btn-link" type="button">
                                    <span class="material-icons">reply_all</span>
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-link btn-sm" type="button" data-toggle="tooltip" title="" data-original-title="Refresh">
                                    <span class="material-icons">sync</span>
                                </button>
                                <div class="dropdown d-none d-md-inline-block">
                                    <button class="btn dropdown-toggle btn-sm btn-link" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="material-icons">settings</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Block</a>
                                        <a class="dropdown-item" href="#">Priority</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- inbox header ends --->

                <div class="row mail-row-height">
                    <!-- Emails list  --->
                    <div class="col-12 col-md-5 col-xl-5 px-0 scroll-y h-100">
                        <ul class="list-group list-group-flush mailist">
                            <li class="list-group-item new">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/yo_f.jpg" alt="">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Rafael Aguilar<small class="text-mute float-right mt-1">03 Sep 2020</small></p>
                                        <p class="text-template-primary-light">Hola Max</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item new">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user2.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Astha Anwar<small class="float-right text-mute">28/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Tommy Boyoth<small class="float-right text-mute">25/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">John Smith<small class="float-right text-mute">2/8/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user2.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Astha Anwar<small class="float-right text-mute">28/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Tommy Boyoth<small class="float-right text-mute">25/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">John Smith<small class="float-right text-mute">2/8/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user2.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Astha Anwar<small class="float-right text-mute">28/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                    </figure>
                                    <a class="media-body">
                                        <p class="mb-0 template-inverse">Tommy Boyoth<small class="float-right text-mute">25/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Tommy Boyoth<small class="float-right text-mute">25/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user1.png" alt="Generic placeholder image">
                                    </figure>
                                    <a class="media-body">
                                        <p class="mb-0 template-inverse">John Smith<small class="float-right text-mute">2/8/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user2.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Astha Anwar<small class="float-right text-mute">28/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <figure class="mb-0 avatar avatar-40 mr-2">
                                        <label class="checkbox-user-check">
                                            <input type="checkbox">
                                            <i class="material-icons">check</i>
                                        </label>
                                        <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                    </figure>
                                    <a href="" class="media-body">
                                        <p class="mb-0 template-inverse">Tommy Boyoth<small class="float-right text-mute">25/7/2018</small></p>
                                        <p class="text-template-primary-light">This is awesome product and, I am very happy with delivery &amp; product packaging..</p>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Emails list ends --->

                    <!-- email content -->
                    <div class="col scroll-y h-100 d-none d-md-block">
                        <div class="row  bg-white text-dark">
                            <div class="col-12 mb-4  border-bottom py-3">
                                <div class="row mb-2">
                                    <div class="col-auto align-self-center">
                                        <label class="small text-mute">To</label>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <div class="media p-2 border rounded mb-1">
                                            <figure class="mb-0 avatar avatar-40 mr-2 vm">
                                                <img src="../assets/img/yo_f.jpg" alt="Generic placeholder image">
                                            </figure>
                                            <div class="media-body">
                                                <p class="mb-0 fs15">Rafael Aguilar<br><small class="text-mute">rafa@desit.com</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <div class="media p-2 border rounded mb-1">
                                            <figure class="mb-0 avatar avatar-40 mr-2 vm">
                                                <img src="../assets/img/user3.png" alt="Generic placeholder image">
                                            </figure>
                                            <div class="media-body">
                                                <p class="mb-0 fs15">Maxartkiller<br><small class="text-mute">info@maxartkiller.com</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <label class="small text-mute">CC</label>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <div class="media p-2 border rounded">
                                            <figure class="mb-0 avatar avatar-20 mr-2 vm">
                                                <img src="../assets/img/user4.png" alt="Generic placeholder image">
                                            </figure>
                                            <div class="media-body">
                                                <p class="mb-0">Jaykant Anwar</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <div class="media p-2 border rounded">
                                            <figure class="mb-0 avatar avatar-20 mr-2">
                                                <img src="../assets/img/user5.png" alt="Generic placeholder image">
                                            </figure>
                                            <div class="media-body">
                                                <p class="mb-0">Sonya Dhaniya</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11 col-xl-9 mx-auto py-5 mb-4">
                                <p>Hola  Max,
                                    <br>
                                    <br>
                                    <i>"Te Saludamos de DESIT"</i>
                                    <br>
                                    <br>Esperamos que est??s muy bien deseando lo mejor para ti.<br>
                                    <br> El motivo de este mensaje es para poder contarte de que estamos ofreci??ndote un plan empresarial por el uso de WhatsApp en tu sistema lo que permitir?? agilizar el envi?? de tus datos, sin la necesidad de salir de el sistema
                                    <br>

                                </p>
                                <br>
                                <blockquote class="blockquote text-center">
                                    <p class="mb-0">Este sorprendente servicio te ser?? entregado por la compra de tu membres??a, adem??s de incluirte diferentes beneficios como el chat empresarial.</p>
                                    <footer class="blockquote-footer mt-3">DESIT PRO Whatsapp</footer>
                                </blockquote>
                                <br>
                                <p>
                                T??rminos aplican un pago mensual por el uso de la aplicaci??n que podr??n mantenerse junto al pago del sistema.
                                    <br>
                                    <br> Por tu atenci??n Gracias,
                                    <br>
                                    <br>
                                    <b>Rafael Aguilar</b><br>
                                    <small>Shift technology offices</small>

                                </p>
                                <img src="../assets/img/logo_drogueriapng.png" alt="" height="25px">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 mx-auto">
                                <div class="page-subtitle">Archivos</div>
                                <div class="row">
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="card mb-4 bg-light-danger border border-danger no-shadow">
                                            <div class="card-body p-2">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="mb-0">Document.pdf</p>
                                                        <h6 class="mb-0">21.0 mb</h6>
                                                    </div>
                                                    <a href="javascript:void(0)" class="avatar avatar-40 bg-danger ml-2">
                                                        <i class="material-icons text-white vm">cloud_download</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="card mb-4 bg-light-warning border border-warning no-shadow">
                                            <div class="card-body p-2">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="mb-0">Document.pdf</p>
                                                        <h6 class="mb-0">21.0 mb</h6>
                                                    </div>
                                                    <a href="javascript:void(0)" class="avatar avatar-40 bg-warning ml-2">
                                                        <i class="material-icons text-white vm">cloud_download</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="card mb-4 bg-light-success border border-success no-shadow">
                                            <div class="card-body p-2">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="mb-0">Document.pdf</p>
                                                        <h6 class="mb-0">21.0 mb</h6>
                                                    </div>
                                                    <a href="javascript:void(0)" class="avatar avatar-40 bg-success ml-2">
                                                        <i class="material-icons text-white vm">cloud_download</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="card mb-4 bg-light-primary border border-primary no-shadow">
                                            <div class="card-body p-2">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="mb-0">Document.pdf</p>
                                                        <h6 class="mb-0">21.0 mb</h6>
                                                    </div>
                                                    <a href="javascript:void(0)" class="avatar avatar-40 bg-primary ml-2">
                                                        <i class="material-icons text-white vm">cloud_download</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="page-subtitle">Responder</div>
                                <div class="card mb-4 shadow-sm border-0">
                                    <div class="card-body p-0">
                                        <textarea class="form-control" rows="5" id="editor"></textarea>
                                    </div>
                                    <div class="card-footer border-0 justify-content-between">
                                        <button class="btn btn-primary"> Enviar </button>
                                        <button class="btn btn-secondary ml-2"> Cancelar </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- email content ends -->

                </div>

            </div>
            <!-- Main container ends -->

        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md text-center text-md-left align-self-center">
                        <p>All rights reserved by <a href="">Maxartkiller</a></p>
                    </div>
                    <div class="col-12 col-md-auto text-center text-md-right">
                        <ul class="nav justify-content-center justify-md-content-end">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Terms of use</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contactus.html">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- wrapper ends -->
    <div class="wrap-fixed-float wrap-fixed-bottom-left">
        <button class="btn btn-primary  btn-rounded-circle shadow chat-btn"><i class="material-icons vm">comment</i></button>
        <div class="chat-window card shadow">
            <div class="card-header">
                <h5 class="d-inline-block fs15 mb-0">SUPPORT Chat</h5>
                <button class="btn btn-sm p-0 float-right chat-close text-white">
                    <span class="rounded avatar avatar-20">
                        <i class="material-icons fs15 vm text-mute">close</i>
                    </span>
                </button>
            </div>
            <div class="card-body chat-list scroll-y p-0 ">
                <div class="p-3">
                    <div class="row left-chat">
                        <div class="col-auto">
                            <figure class="avatar avatar-20">
                                <img src="../assets/img/user1.png" alt="">
                            </figure>
                        </div>
                        <div class="col pl-0">
                            <div class="chat-block">
                                <div class="row">
                                    <div class="col">
                                        Bienvenido! ??Cuentanos que necesitas?
                                        <p class="text-mute small mt-2">8:00 pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row right-chat">
                        <div class="col pr-0">
                            <div class="chat-block">
                                <div class="row">
                                    <div class="col">
                                       Quiero saber como ingresar un producto
                                        <p class="text-mute small mt-2">8:05 pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <figure class="avatar avatar-20">
                                <img src="../assets/img/user3.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="row left-chat">
                        <div class="col-auto">
                            <figure class="avatar avatar-20">
                                <img src="../assets/img/user1.png" alt="">
                            </figure>
                        </div>
                        <div class="col pl-0">
                            <div class="chat-block">
                                <div class="row">
                                    <div class="col">
                                        Con gusto te ayudo.<br>
                                        Revisa este video para poder hacer el proceso de ingreso de productos.
                                       <a href="https://www.youtube.com/watch?v=I-QfPUz1es8" target="blank">INGRESO DE PRODUCTOS</a>
                                        <p class="text-mute small mt-2">8:06 pm</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row right-chat">
                        <div class="col pr-0">
                            <div class="chat-block">
                                <div class="row">
                                    <div class="col">
                                        <p>Muchas gracias me fue de gran ayuda. </p>
                                        <p class="text-mute small mt-2">8:10 pm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <figure class="avatar avatar-20">
                                <img src="../assets/img/user3.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="row left-chat">
                        <div class="col-auto">
                            <figure class="avatar avatar-20">
                                <img src="../assets/img/user1.png" alt="">
                            </figure>
                        </div>
                        <div class="col pl-0">
                            <div class="chat-block">
                                <div class="row">
                                    <div class="col">
                                        Me alegro mucho.<br>
                                        Tienes alguna otra duda?.
                                       
                                        <p class="text-mute small mt-2">8:11 pm</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer px-0">
                <div class="input-group">
                    <div class="input-group-prepend ">
                        <button class="btn btn-link fs15 py-0 " type="button" id="button-addon4"><i class="material-icons vm">attachment</i></button>
                    </div>
                    <input type="text" class="form-control form-control-sm rounded" placeholder="Type Message..." aria-label="Message">
                    <div class="input-group-append ">
                        <button class="btn btn-link py-0 " type="button" id="button-addon5">
                            <i class="material-icons fs15 vm">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create mail Modal -->
    <div class="modal fade" id="mailcreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="page-subtitle text-dark">To:</div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="select name">
                    </div>
                    
                    <div class="page-subtitle text-dark">CC:</div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="select name">
                    </div>
                    
                    <div class="page-subtitle text-dark">Quick Reply</div>
                    <textarea class="form-control" rows="5" id="editor2"></textarea>
                    
                    <div class="page-subtitle text-dark">Attachments</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 col-xl-3">
                            <div class="card my-2 bg-white shadow-sm">
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="mb-0">Document.pdf<br> <small>30.00 mb</small></p>
                                        </div>
                                        <a href="javascript:void(0)" class="avatar avatar-30 bg-danger ml-2">
                                            <i class="material-icons md-18 text-white vm">delete</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-3">
                            <div class="card my-2 bg-white shadow-sm">
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="mb-0">Document.pdf<br> <small>30.00 mb</small></p>
                                        </div>
                                        <a href="javascript:void(0)" class="avatar avatar-30 bg-danger ml-2">
                                            <i class="material-icons md-18 text-white vm">delete</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-3">
                            <div class="card my-2 bg-white shadow-sm">
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="mb-0">Document.pdf<br> <small>30.00 mb</small></p>
                                        </div>
                                        <a href="javascript:void(0)" class="avatar avatar-30 bg-danger ml-2">
                                            <i class="material-icons md-18 text-white vm">delete</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-3">
                            <div class="card my-2 bg-white shadow-sm">
                                <div class="card-body p-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="mb-0">Document.pdf<br> <small>30.00 mb</small></p>
                                        </div>
                                        <a href="javascript:void(0)" class="avatar avatar-30 bg-danger ml-2">
                                            <i class="material-icons md-18 text-white vm">delete</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button class="btn btn-primary"> Send </button>
                    <button class="btn btn-secondary ml-2" type="button" data-dismiss="modal"> Discard </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Create mail ends -->

    <!-- Theme style picker modal window and options -->
    <div class="wrap-fixed-float wrap-fixed-bottom-right">
        <button class="btn btn-primary btn-rounded-circle shadow" data-target="#themepicker" data-toggle="modal"><i class="material-icons vm">style</i><span class="counter-small bg-danger"></span></button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="themepicker" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg-dark overflow-hidden">
                <button type="button" class="closePersonalize" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
                <div class="modal-body">
                    <div class="background h-320">
                        <img src="../assets/img/background-part.png" alt="">
                    </div>
                    <div class="text-center pb-5">
                        <h1 class="mt-3 mb-0 text-white">Personaliza tu sistema</h1>
                        <h4 class="mb-5 text-white font-weight-light">Crea tu propio estilo</h4>
                    </div>

                    <div class="row top-60">
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card border-0 shadow bg-white h-100">
                                <div class="card-body text-center">
                                    <i class="avatar avatar-60 md-36 material-icons text-template-primary my-3">format_shapes</i>
                                    <h6 class="mb-3">Tama??o de letras</h6>
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <ul class="list-group list-group-flush mb-0 text-left">
                                                <li class="list-group-item">
                                                    XS
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="fontsize" class="custom-control-input" id="xsmallfs">
                                                        <label class="custom-control-label" for="xsmallfs"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    S
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="fontsize" class="custom-control-input" id="smallfs" checked>
                                                        <label class="custom-control-label" for="smallfs"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    M
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="fontsize" class="custom-control-input" id="mediumfs">
                                                        <label class="custom-control-label" for="mediumfs"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    L
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="fontsize" class="custom-control-input" id="largefs">
                                                        <label class="custom-control-label" for="largefs"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card border-0 shadow bg-white h-100">
                                <div class="card-body text-center">
                                    <i class="avatar avatar-60 md-36 material-icons bg-light-warning text-warning my-3">style</i>
                                    <h6 class="mb-3">Sidebar</h6>
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <ul class="list-group list-group-flush mb-0 text-left">
                                                <li class="list-group-item">
                                                    Normal
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="sidebar" class="custom-control-input" id="sidebarfull" checked>
                                                        <label class="custom-control-label" for="sidebarfull"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Compact
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="sidebar" class="custom-control-input" id="sidebarCompact">
                                                        <label class="custom-control-label" for="sidebarCompact"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Iconic
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="radio" name="sidebar" class="custom-control-input" id="sidebarIconic">
                                                        <label class="custom-control-label" for="sidebarIconic"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Fill Color
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" class="custom-control-input" id="sidebarFill">
                                                        <label class="custom-control-label" for="sidebarFill"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card border-0 shadow bg-white h-100">
                                <div class="card-body text-center">
                                    <i class="avatar avatar-60 md-36 material-icons bg-light-danger text-danger my-3">menu</i>
                                    <h6 class="mb-3">Header</h6>
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <ul class="list-group list-group-flush mb-0 text-left">
                                                <li class="list-group-item">
                                                    Fixed Top
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" class="custom-control-input" id="headerfixed">
                                                        <label class="custom-control-label" for="headerfixed"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Fixed Width
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" class="custom-control-input" id="headercontainer">
                                                        <label class="custom-control-label" for="headercontainer"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Fill Color
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" class="custom-control-input" id="headerfillcolor">
                                                        <label class="custom-control-label" for="headerfillcolor"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-4">
                            <div class="card border-0 shadow bg-white h-100">
                                <div class="card-body text-center">
                                    <i class="avatar avatar-60 md-36 material-icons bg-light-success text-success my-3">subtitles</i>
                                    <h6 class="mb-3">Contenido</h6>
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <ul class="list-group list-group-flush mb-0 text-left">
                                                <li class="list-group-item">
                                                    Square
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" name="sidebar" class="custom-control-input" id="wrapperCorner">
                                                        <label class="custom-control-label" for="wrapperCorner"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Full Width
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" name="sidebar" class="custom-control-input" id="contentWidth">
                                                        <label class="custom-control-label" for="contentWidth"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Spacious
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" name="sidebar" class="custom-control-input" id="moderntouch">
                                                        <label class="custom-control-label" for="moderntouch"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Fullscreen
                                                    <div class="custom-control custom-switch float-right">
                                                        <input type="checkbox" name="sidebar" class="custom-control-input" id="fullscreen">
                                                        <label class="custom-control-label" for="fullscreen"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <div class="row w-100 mx-0">
                        <div class="col-12 col-md-6 text-center">
                            <h6><i class="material-icons vm mr-1">brightness_2</i> Dark</h6>
                            <div class="avatar mb-1 avatar-30 bg-dark style-picker" data-target='style-black-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-darkblue style-picker" data-target='style-darkblue-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-purple style-picker" data-target='style-purple-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-blue style-picker" data-target='style-blue-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-green style-picker" data-target='style-green-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-pista style-picker" data-target='style-pista-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-orange style-picker" data-target='style-orange-dark'></div>
                            <div class="avatar mb-1 avatar-30 bg-tomato style-picker" data-target='style-tomato-dark'></div>
                        </div>
                        <div class="col-12 col-md-6 text-center">
                            <h6><i class="material-icons vm mr-1">brightness_7</i> Light</h6>
                            <div class="avatar mb-1 avatar-30 bg-dark style-picker" data-target='style-black-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-darkblue style-picker" data-target='style-darkblue-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-purple style-picker" data-target='style-purple-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-blue style-picker" data-target='style-blue-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-green style-picker" data-target='style-green-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-pista style-picker" data-target='style-pista-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-orange style-picker" data-target='style-orange-light'></div>
                            <div class="avatar mb-1 avatar-30 bg-tomato style-picker" data-target='style-tomato-light'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Theme style picker modal window and options ends -->

    <!-- Global js mandatory -->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script><script src="../assets/vendor/cookie/jquery.cookie.js"></script>
    <!-- Global js ends -->

    <!-- Vendor or 3rd party js -->

    <!-- date range picker -->
    <script src="../assets/vendor/daterangepicker-master/moment.min.js"></script>
    <script src="../assets/vendor/daterangepicker-master/daterangepicker.js"></script>
    <!-- ckeditor picker -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <!-- Vendor or 3rd party js ends -->

    <!-- Customized template js mandatory -->
    <script src="../assets/js/main.js"></script>
    <!-- Customized template js ends -->

    <!-- theme picker -->
    <script src="../assets/js/style-picker.js"></script>
    <!-- theme picker ends -->

    <!-- Customized page level js -->
    <script>
        'use strict'
        $(document).ready(function() {         
            /* Editor ckEditor */
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#editor2'))
                .catch(error => {
                    console.error(error);
                });

            /* checkbox select all */
            $('#selectall').on('click', function() {
                if ($(this).is(':checked') === true) {
                    $('.checkbox-user-check').find('input[type="checkbox"]').attr('checked', true).parent().addClass('active');
                } else {
                    $('.checkbox-user-check').find('input[type="checkbox"]').attr('checked', false).parent().removeClass('active');
                }
            });

        });

    </script>
    <!-- Customized page level js ends -->
</body>

<!-- Body ends -->

</html>
