$(document).ready(init);
function init()
{
	//LOAD AJAX
	$("#tabla_sucursal").html("<center><img src='../img/load.gif' width='200'></center>");
	$("#tabla_mesa").html("<center><img src='load.gif' width='200'></center>");
	$("#tabla_empleado").html("<center><img src='load.gif' width='200'></center>");
	$("#tabla_alimento").html("<center><img src='load.gif' width='200'></center>");
	//Cargando tablas
	$("#tabla_sucursal").load("tabla/tabla_sucursal.php");
	$("#tabla_mesa").load("tabla/tabla_mesa.php");
	$("#tabla_empleado").load("tabla/tabla_empleado.php");
	$("#tabla_alimento").load("tabla/tabla_alimento.php");
}


function nuevaSucursal()
{
$("#modal_nueva_sucursal").modal();
}
function insertSucursal()
{
var nombre =$("#txt_nombre_sucursal_nueva").prop("value");
$.post("control/insert_sucursal.php",
		{
			nombre:nombre,
			direccion:direccion
		},
		function(data){
			alert(data);
			$("#modal_nueva_sucursal").modal("hide");
		});
}

function deleteSucursal(id_sucursal)
{
	if(confirm("¿Seguro que deseas eliminar este registro?"))
	{
		$.post("control/delete_sucursal.php",
			{
				id_sucursal:id_sucursal
			},
			function(data){
				alert(data);
				$("#tabla_sucursal").html("<center><img src='../img/load.gif' width='200'></center>");
				$("#tabla_sucursal").load("tabla/tabla_sucursal.php");
			});
	}	
}

