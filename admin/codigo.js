$(document).ready(init);
function init()
{
	//LOAD AJAX
	$("#tabla_sucursal").html("<center><img src='../img/load.gif' width='200'></center>");
	$("#tabla_mesa").html("<center><img src='../img/load.gif' width='200'></center>");
	$("#tabla_empleado").html("<center><img src='../img/load.gif' width='200'></center>");
	$("#tabla_alimento").html("<center><img src='../img/load.gif' width='200'></center>");
	//Cargando tablas
	$("#tabla_sucursal").load("tabla/tabla_sucursal.php");
	$("#tabla_mesa").load("tabla/tabla_mesa.php");
	$("#tabla_empleado").load("tabla/tabla_empleado.php");
	$("#tabla_alimento").load("tabla/tabla_alimento.php");
}

//SUCURSAL
function nuevaSucursal()
{
$("#modal_nueva_sucursal").modal();
}
function insertSucursal()
{
var sucursal =$("#txt_nombre_sucursal_nueva").prop("value");
var telefono =$("#txt_telefono_sucursal_nueva").prop("value");
var mapa =$("#txt_mapa_sucursal_nueva").prop("value");
var calle_numero =$("#txt_calle_numero_sucursal_nueva").prop("value");
var colonia =$("#txt_colonia_sucursal_nueva").prop("value");
var delegacion =$("#txt_delegacion_sucursal_nueva").prop("value");
var cp =$("#txt_cp_sucursal_nueva").prop("value");
$.post("control/insert_sucursal.php",
		{
			sucursal:sucursal,
			telefono:telefono,
			mapa:mapa,
			calle_numero:calle_numero,
			colonia:colonia,
			delegacion:delegacion,
			cp:cp
			
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

//MESA
function showNuevaMesa()
{
$("#modal_nueva_mesa").modal();
}

function insertMesa()
{
var nombre =$("#txt_numero_mesa_nueva").prop("value");
$.post("control/insert_mesa.php",
		{
			capacidad:capacidad,
			estatus:estatus
		},
		function(data){
			alert(data);
			$("#modal_nueva_mesa").modal("hide");
		});
}

function deleteMesa(id_mesa)
{
	if(confirm("¿Seguro que deseas eliminar este registro?"))
	{
		$.post("control/delete_mesa.php",
			{
				id_mesa:id_mesa
			},
			function(data){
				alert(data);
				$("#tabla_mesa").html("<center><img src='../img/load.gif' width='200'></center>");
				$("#tabla_mesa").load("tabla/tabla_mesa.php");
			});
	}	
}
//EMPLEADO
function nuevoEmpleado()
{
$("#modal_nuevo_empleado").modal();
}
function insertEmpleado()
{
var nombre =$("#txt_nombre_empleado_nuevo").prop("value");
$.post("control/insert_empleado.php",
		{
			nombre:nombre,
			telefono:telefono,
			email:email
		},
		function(data){
			alert(data);
			$("#modal_nuevo_empleado").modal("hide");
		});
}

function deleteMesa(id_empleado)
{
	if(confirm("¿Seguro que deseas eliminar este registro?"))
	{
		$.post("control/delete_empleado.php",
			{
				id_empleado:id_empleado
			},
			function(data){
				alert(data);
				$("#tabla_empleado").html("<center><img src='../img/load.gif' width='200'></center>");
				$("#tabla_empleado").load("tabla/tabla_empleado.php");
			});
	}	
}



