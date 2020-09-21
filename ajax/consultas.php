<?php 
require_once "../modelos/Consultas.php";
require "../config/Conexion.php";

$consulta = new Consultas();

switch ($_GET["op"]) {
	

    case 'comprasfecha':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];

		$rspta=$consulta->comprasfecha($fecha_inicio,$fecha_fin);
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>$reg->fecha,
            "1"=>$reg->usuario,
            "2"=>$reg->proveedor,
            "3"=>$reg->tipo_comprobante,
            "4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
            "5"=>$reg->total_compra,
            "6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

     case 'ventasfechacliente':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];
    $idcliente=$_REQUEST["idcliente"];

        $rspta=$consulta->ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente);
        $data=Array();

        while ($reg=$rspta->fetch_object()) {
            $data[]=array(
            "0"=>$reg->fecha,
            "1"=>$reg->usuario,
            "2"=>$reg->cliente,
            "3"=>$reg->tipo_comprobante,
            "4"=>$reg->serie_comprobante.' '.$reg->num_comprobante,
            "5"=>$reg->total_venta,
            "6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
              );
        }
        $results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
        echo json_encode($results);
        break;

        case 'ventasEmpleado':
          $fecha_inicio=$_REQUEST["fecha_inicio"];
          $hora_inicio=$_REQUEST["hora_inicio"];
          $fecha_fin=$_REQUEST["fecha_fin"];
          $hora_fin=$_REQUEST["hora_fin"];
          $idcliente=$_REQUEST["idcliente"];
          $opcion=$_REQUEST["opcion"];
          

        $fecha_inicio=$fecha_inicio.' '.$hora_inicio;
         $fecha_fin=$fecha_fin.' '.$hora_fin;

              $rspta=$consulta->ventasfechaEmpleado($fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$idcliente,$opcion);
              $data=Array();
              $total=0;
              while ($reg=$rspta->fetch_object()) {
               $url='../reportes/exTicket.php?id=';
                  $data[]=array(
                  "0"=> '<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info btn-xs" title="Ver Ticket"><i class="fa fa-file"></i></button></a>',     
                  "1"=>$reg->fecha,
                  "2"=>$reg->usuario,
                  "3"=>$reg->tipo_comprobante,
                  "4"=>$reg->idventa,
                  "5"=>$reg->total_venta,
                  "6"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
                    );
                    $total= $reg->total_venta+$total;
              }
              $data[]=array(  
               "0"=>"<h3>Total</h3>",
               "1"=>"<h3>".$total."</h3>",
               "2"=>" ",
               "3"=>" ",
               "4"=>" ",
               "5"=>" ",
               "6"=>" ",
                 );
              $results=array(
                   "sEcho"=>1,//info para datatables
                   "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
                   "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
                   "aaData"=>$data); 
              echo json_encode($results);
              break;


             case 'total':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];
    $hora_fin=$_REQUEST["hora_fin"];
    $hora_inicio=$_REQUEST["hora_inicio"];
    $servicio=$_REQUEST["servicio"];
    $opcion=$_REQUEST["opcion"];

    $fecha_inicio=$fecha_inicio.' '.$hora_inicio;
    $fecha_fin=$fecha_fin.' '.$hora_fin;

        $rspta=$consulta->total($fecha_inicio,$fecha_fin,$servicio,$opcion);
        $data=Array();
        $total=0;
        while ($reg=$rspta->fetch_object()) {   
$codigo=0;
$Cantidad=0;
$Producto=0;
$venta=0;       
              $Venta=mysqli_query($conexion,"SELECT a.codigo,a.nombre,d.`cantidad`,ca.nombre as Categoria,d.`cantidad`*d.`precio_venta` as venta FROM `detalle_venta` d inner join articulo a on d.`idarticulo`=a.`idarticulo` inner join venta v on d.`idventa`=v.idventa inner join categoria ca on a.idcategoria = ca.idcategoria WHERE v.`estado`='Aceptado' and d.`idarticulo`='$reg->idarticulo' and v.fecha_hora >='$fecha_inicio' AND v.fecha_hora <='$fecha_fin'");
              while($detalle=mysqli_fetch_array($Venta)) { 
                $codigo=$detalle['codigo'];
                $Categoria=$detalle['Categoria'];
                $Cantidad=$detalle['cantidad']+$Cantidad;
                $Producto=$detalle['nombre'];
                $venta=$detalle['venta']+$venta;
                $total= $detalle['venta']+$total;
            }
            $data[]=array(  
              "0"=>$codigo,
              "1"=>$Producto,
              "2"=>$Categoria,
              "3"=>$Cantidad,
              "4"=>$venta,
                );    
        }      
        $data[]=array(  
          
          "0"=>"<h3>Total</h3>",
          "1"=>"<h3>".$total."</h3>",
          "2"=>" ",
          "3"=>" ",
          "4"=>" ",
            );
        $results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data);
             echo json_encode($results);
        break;
}
 ?>