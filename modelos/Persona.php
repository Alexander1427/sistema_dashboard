<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Persona{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($tipo_persona,$nombre,$tipo_documento,$num_documento,$tipo_documento2,$num_documento2,$direccion,$telefono,$email,$giro,$Departamento){
	$sql="INSERT INTO persona (tipo_persona,nombre,tipo_documento,num_documento,direccion,telefono,email,tipo_documento2,num_documento2,Departamento,giro) VALUES ('$tipo_persona','$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$tipo_documento2','$num_documento2','$Departamento','$giro')";
	return ejecutarConsulta($sql);
}



public function editar($tipo_persona,$nombre,$tipo_documento,$num_documento,$tipo_documento2,$num_documento2,$direccion,$telefono,$email,$giro,$Departamento){
	$sql="UPDATE persona SET tipo_persona='$tipo_persona', nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',tipo_documento2='$tipo_documento2',num_documento2='$num_documento2',Departamento='$Departamento',giro='$giro'
	WHERE idpersona='$idpersona'";
	return ejecutarConsulta($sql);
}
//funcion para eliminar datos
public function eliminar($idpersona){
	$sql="DELETE FROM persona WHERE idpersona='$idpersona'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idpersona){
	$sql="SELECT * FROM persona WHERE idpersona='$idpersona'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listarp(){
	$sql="SELECT * FROM persona WHERE tipo_persona='Proveedor'";
	return ejecutarConsulta($sql);
}
public function listarc(){
	$sql="SELECT * FROM persona WHERE tipo_persona='Cliente'";
	return ejecutarConsulta($sql);
}

public function vendedor(){
	$sql="SELECT * FROM `usuario` ";
	return ejecutarConsulta($sql);
}

public function categoria(){
	$sql="SELECT * FROM `categoria` ";
	return ejecutarConsulta($sql);
}

public function codigoarticulo(){
	$sql="SELECT MAX(`codigo`)+1 as numero FROM `articulo` WHERE 1";
	return ejecutarConsultaSimpleFila($sql);
}

}

 ?>
