<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Venta{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idcliente,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$descripcion,$total_venta,$idarticulo,$cantidad,$precio_venta){
	$sql="INSERT INTO venta (idcliente,idusuario,tipo_comprobante,serie_comprobante,num_comprobante,impuesto,total_venta,estado,Descripcion) VALUES ('8','$idusuario','Ticket','$serie_comprobante','$num_comprobante','$impuesto','$total_venta','Aceptado','$descripcion')";

	//return ejecutarConsulta($sql);
	 $idventanew=ejecutarConsulta_retornarID($sql);
	 $num_elementos=0;
	 $sw=true;
	 while ($num_elementos < count($idarticulo)) {

	 	$sql_detalle="INSERT INTO detalle_venta (idventa,idarticulo,cantidad,precio_venta) VALUES('$idventanew','$idarticulo[$num_elementos]','$cantidad[$num_elementos]','$precio_venta[$num_elementos]')";

	 	ejecutarConsulta($sql_detalle) or $sw=false;

	 	$num_elementos=$num_elementos+1;
	 }
	 return $sw;
}

public function anular($idventa){
	
	require "../config/Conexion.php";
	$consultas=mysqli_query($conexion,"SELECT dv.idarticulo,dv.cantidad FROM `venta` v inner join detalle_venta dv on v.idventa=dv.idventa WHERE v.`idventa`='$idventa'");
	while($consulta=mysqli_fetch_array($consultas))
	{
		$idarticulo=$consulta['idarticulo'];
		$cantidad=$consulta['cantidad'];
		$stock=mysqli_query($conexion,"SELECT `stock` FROM `articulo` WHERE `idarticulo`='$idarticulo'");
        $stockactual= mysqli_fetch_row($stock);
        $stocktotal=$stockactual[0];
		$stocktotal=$stocktotal+$cantidad;
        $sql="UPDATE `articulo` SET `stock`='$stocktotal' WHERE `idarticulo`='$idarticulo'";
		ejecutarConsulta($sql);
	}
	$sql="UPDATE venta SET estado='Anulado' WHERE idventa='$idventa'";
	return ejecutarConsulta($sql);
}


//implementar un metodopara mostrar los datos de unregistro a modificar
public function mostrar($idventa){
	$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE idventa='$idventa'";
	return ejecutarConsultaSimpleFila($sql);
}

public function listarDetalle($idventa){
	$sql="SELECT dv.idventa,dv.idarticulo,a.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal FROM detalle_venta dv INNER JOIN articulo a ON dv.idarticulo=a.idarticulo WHERE dv.idventa='$idventa'";
	return ejecutarConsulta($sql);
}

//listar registros
public function listar(){
	$sql="SELECT v.idventa,v.fecha_hora as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario ORDER BY v.idventa DESC";
	return ejecutarConsulta($sql);
}


public function ventacabecera($idventa){
	$sql= "SELECT v.idventa, v.idcliente, p.nombre AS cliente, p.direccion,p.tipo_documento,p.tipo_documento2,p.Departamento, p.num_documento,p.num_documento2, p.email, p.telefono,p.giro, v.idusuario, u.nombre AS usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, v.fecha_hora AS fecha, v.impuesto, v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
	return ejecutarConsulta($sql);
}

public function ventadetalles($idventa){

 $sql="SELECT a.nombre AS articulo, a.codigo, d.cantidad, d.precio_venta, v.Descripcion,v.total_venta, (d.cantidad*d.precio_venta) AS subtotal FROM detalle_venta d INNER JOIN articulo a ON d.idarticulo=a.idarticulo inner join venta v on d.idventa=v.idventa WHERE d.idventa='$idventa'";
         return ejecutarConsulta($sql);
}

public function ventadetalles2($idventa){

 $sql="SELECT * FROM venta WHERE idventa='$idventa'";
         return ejecutarConsulta($sql);
}




}

 ?>
