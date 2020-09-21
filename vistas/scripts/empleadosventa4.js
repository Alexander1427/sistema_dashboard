var tabla;

//funcion que se ejecuta al inicio
function init(){

   listar();

   $("#fecha_inicio").change(listar);
   $("#hora_inicio").change(listar);
   $("#fecha_fin").change(listar);
   $("#hora_fin").change(listar);
   $("#opcion").change(listar);
   $("#idcliente").change(listar);

    //cargamos los items al select cliente
   $.post("../ajax/venta.php?op=selectVendedor", function(r){
   	$("#idcliente").html(r);
   	$('#idcliente').selectpicker('refresh');
   });

}

//funcion listar
function listar(){
var  fecha_inicio = $("#fecha_inicio").val();
var hora_inicio = $("#hora_inicio").val();
 var fecha_fin = $("#fecha_fin").val();
 var hora_fin = $("#hora_fin").val();
 var opcion = $("#opcion").val();
 var idcliente = $("#idcliente").val();
 


	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/consultas.php?op=ventasEmpleado',
			data:{fecha_inicio:fecha_inicio, hora_inicio: hora_inicio, fecha_fin:fecha_fin , hora_fin: hora_fin, idcliente: idcliente, opcion:opcion},
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}


init();  