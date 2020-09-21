var tabla;

//funcion que se ejecuta al inicio
function init(){
   listar();
   $("#fecha_inicio").change(listar);
   $("#fecha_fin").change(listar);
   $("#hora_fin").change(listar);
   $("#hora_inicio").change(listar);
   $("#opcion").change(listar);
   $("#servicio").change(listar);

   $.post("../ajax/venta.php?op=selectServicio", function(r){
	$("#servicio").html(r);
	$('#servicio').selectpicker('refresh');
});
}

//funcion listar
function listar(){
var  fecha_inicio = $("#fecha_inicio").val();
 var fecha_fin = $("#fecha_fin").val();
 var hora_inicio = $("#hora_inicio").val();
 var hora_fin = $("#hora_fin").val();
 var opcion = $("#opcion").val();
 var servicio = $("#servicio").val();

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
			url:'../ajax/consultas.php?op=total',
			data:{fecha_inicio:fecha_inicio, hora_inicio:hora_inicio, hora_fin:hora_fin ,fecha_fin:fecha_fin,servicio:servicio,opcion:opcion},
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