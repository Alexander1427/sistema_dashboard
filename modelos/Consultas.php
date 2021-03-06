<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Consultas{


	//implementamos nuestro constructor
public function __construct(){

}

//listar registros
public function comprasfecha($fecha_inicio,$fecha_fin){
	$sql="SELECT DATE(i.fecha_hora) as fecha, u.nombre as usuario, p.nombre as proveedor, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante, i.total_compra,i.impuesto,i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE DATE(i.fecha_hora)>='$fecha_inicio' AND DATE(i.fecha_hora)<='$fecha_fin'";
	return ejecutarConsulta($sql);
}

public function total($fecha_inicio,$fecha_fin,$servicio,$opcion){
	if($opcion==1){
	$sql="SELECT DISTINCT d.`idarticulo` from venta v inner join detalle_venta d on d.idventa=v.idventa WHERE v.fecha_hora >='$fecha_inicio' AND v.fecha_hora <='$fecha_fin' and estado='Aceptado'";
     }else{
		$sql="SELECT DISTINCT d.`idarticulo` from venta v inner join detalle_venta d on d.idventa=v.idventa inner join articulo ar on d.idarticulo=ar.idarticulo WHERE v.fecha_hora >='$fecha_inicio' AND v.fecha_hora <='$fecha_fin' and ar.idcategoria='$servicio' and estado='Aceptado'";
	}
	return ejecutarConsulta($sql);
}

public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente){
	$sql="SELECT DATE(v.fecha_hora) as fecha, u.nombre as usuario, p.nombre as cliente, v.tipo_comprobante,v.serie_comprobante, v.num_comprobante , v.total_venta, v.impuesto, v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
	return ejecutarConsulta($sql);
}

public function ventasfechaEmpleado($fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$idcliente,$opcion){
	if($opcion==1){
		$sql="SELECT v.fecha_hora as fecha, u.nombre as usuario, p.nombre as cliente, v.tipo_comprobante,v.serie_comprobante, v.num_comprobante , v.total_venta, v.impuesto, v.estado ,v.idventa FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.fecha_hora >='$fecha_inicio' AND v.fecha_hora<='$fecha_fin' and v.estado='Aceptado'";
	}else{
	$sql="SELECT v.fecha_hora as fecha, u.nombre as usuario, p.nombre as cliente, v.tipo_comprobante,v.serie_comprobante, v.num_comprobante , v.total_venta, v.impuesto, v.estado ,v.idventa FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.fecha_hora >='$fecha_inicio' AND v.fecha_hora<='$fecha_fin' AND v.idusuario='$idcliente' and v.estado='Aceptado'";
	}
	return ejecutarConsulta($sql);
}

public function totalcomprahoy(){
	$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
	return ejecutarConsulta($sql);
}

public function totalventahoy(){
	$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
	return ejecutarConsulta($sql);
}

public function comprasultimos_10dias(){
	$sql=" SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) AS fecha, SUM(total_compra) AS total FROM ingreso GROUP BY fecha_hora ORDER BY fecha_hora DESC LIMIT 0,10";
	return ejecutarConsulta($sql);
}
public function consultaservicios(){
	$fechaactual=date("Y-m-d");
	$sql="SELECT DISTINCT d.`idarticulo` from venta v inner join detalle_venta d on d.idventa=v.idventa inner join articulo ar on d.idarticulo=ar.idarticulo inner join categoria ca on ar.idcategoria=ca.idcategoria  WHERE DATE(v.fecha_hora)>='$fechaactual' AND DATE(v.fecha_hora)<='$fechaactual' and ca.idcategoria=26";
	return ejecutarConsulta($sql);
}


}

 ?>
