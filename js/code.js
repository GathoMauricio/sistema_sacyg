//Prueba commit
$(document).ready(init);//ejecuta la función init en cuanto el documento ha sido cargado

function init()
{
	  $(".rslides").responsiveSlides();////SLIDESRESPONSIVE: le agrega propiedades al slider del inicio
}
function cargarInicio()
{
	$("#contenedor_principal").html("<img src='img/load.gif'>");
	$.post("php/inicio.php",{},function(data){//JQUERY: función post 
		$("#contenedor_principal").html(data);//AJAX:llenando contenedor 
		$(".rslides").responsiveSlides();//SLIDESRESPONSIVE: le agrega propiedades al slider del inicio (indispensable si la página es recargada)
		(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
	});
}
function cargarPlatillos()
{
	$("#contenedor_principal").html("<img src='img/load.gif'>");

	$.post("php/platillos.php",{},function(data){
		$("#contenedor_principal").html(data);//AJAX:llenando contenedor 
		$( "#accordion" ).accordion();//JQUERY-UI: creando acordeon
		$(".mueve").draggable({//JQUERY-UI: poniendo propiedad draggable a elementos del menú
			helper:'clone',//JSON: clona el Item en el div destino
			appendTo:'body'//JSON: evita q el Item se deje caer en un lugar diferente al div especificado
		});
		$("#div_orden").droppable({//JQUERY-UI: poniendo prop droppable al div destino
			activeClass:'ui-state-default',//JSON: estilo del div destino al detectar movimiento
			hoverClass:'ui-state-hover',//JSON: estilo del div destino al paras un item sobre el
			drop:soltado//JSON: ejecuta la función 'soltado' al recibir un Item
		});
	});
	
}
var contador=0; //se utiliza para poner un ID único a cada Item
var total=0;//lleva la suma de los precios de los items
function soltado(e,elemento)
{
		
	//Obteniendo el precio del item
	var precio=elemento.draggable.find('span').text();
		
	//incrementa contador
	contador++;
	//Agregando inputs al formulario de Paypal con los valores del item recibido
	var html='<input type="hidden" name="item_name_'+contador+'" value="'+elemento.draggable.text()+'">'+
				'<input type="hidden" name="amount_'+contador+'" value="'+precio+'">'+
				'<input type="hidden" name="quantity_1" value="1">'+
				'<label>'+elemento.draggable.text()+'</label><br>';
				$(this).find('form').find('#div_lista').append(html);
	//sumando precion		
	total+=parseInt(precio);
	//pintando el total en la etiqueta debajo del boton de paypal
	$("#lbl_total").text("Total: $"+total);		

}
function tipoServicio(tipo)
{
	if(tipo==1)
	{
		//reservacion
		$.post("php/modal_reservacion.php",{},function(data){
			$("#div_tipo_servicio").html(data);
			$("#modal_reservacion").modal();
			cargarMesas($("#txt_sucursal_reservacion").prop("value"));
		});
	}else{
		//pedido
		$.post("php/modal_pedido.php",{},function(data){
			$("#div_tipo_servicio").html(data);
			$("#modal_pedido").modal();
		});
	}
}


function showLogin()
{
	$("#modal_login").modal();
}
function validaCliente()
{
	var usuario =$("#txt_usuario_login").prop("value");
	var contrasena =$("#txt_contrasena_login").prop("value");
	$("#modal_login").modal("hide");
	$.post("control/valida_cliente.php",
		{
			usuario:usuario,
			contrasena:contrasena
		}
		,function(data){
			if(data >= 1)
			{
				cargarPlatillos();
			}else{
				alert("Datos incorrectos!!!");
			}
		});
}
function cargarMesas(id_sucursal)
{
	$.post("php/carga_mesas.php",{id_sucursal:id_sucursal},function(data){
		$("#txt_mesa_reservacion").html(data)
	});
	
}

function generarPedido()
{
	var boolReservacion=document.getElementById("rb_reservacion").checked;
	var boolDomicilio=document.getElementById("rb_domicilio").checked;

	if(boolReservacion==true && boolDomicilio==false)
	{
		//Si se seleciono reservacion validamos q los campos necesarios esten llenos
		var fecha=$("#txt_fecha_reservacion").prop("value");
		var hora=$("#txt_hora_reservacion").prop("value");
		var mesa=$("#txt_mesa_reservacion").prop("value");
		if(fecha.length<=0 || hora.length<=0 || mesa.length<=0){
			$("#modal_reservacion").modal();
			alert("Es necesario llenar todos los campos!!!"); 
		}else{
			alert("OK Reservacion");
		}

	}else{
		if(boolReservacion==false && boolDomicilio==true)
		{
			alert("Domicilio");
		}
	}
	
}
function pedirPosicion(pos)
{
   	$("#txt_latitud_pedido").prop("value",pos.coords.latitude);
   	$("#txt_longitud_pedido").prop("value",pos.coords.longitude);
}
function geolocalizame()
{
navigator.geolocation.getCurrentPosition(pedirPosicion);
}