//Prueba commit
$(document).ready(init);//ejecuta la función init en cuanto el documento ha sido cargado
var cont=0;
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
function cargarEstablecimientos()
{
	$("#contenedor_principal").html("<img src='img/load.gif'>");
	$.post("php/establecimientos.php",{},function(data){//JQUERY: función post 
		$("#contenedor_principal").html(data);//AJAX:llenando contenedor 
		
		(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
	});
}
function cargarContactanos()
{
	$("#contenedor_principal").html("<img src='img/load.gif'>");
	$.post("php/contactanos.php",{},function(data){//JQUERY: función post 
		$("#contenedor_principal").html(data);//AJAX:llenando contenedor 
		
		(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
	});
}
function cargarQuienes()
{
	$("#contenedor_principal").html("<img src='img/load.gif'>");
	$.post("php/quienes.php",{},function(data){//JQUERY: función post 
		$("#contenedor_principal").html(data);//AJAX:llenando contenedor 
		
		(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
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
	$("#lbl_total").text(total);	
	//guardando productor como variables de sesion	
	$.post("php/producto_sesion.php",{
		id_alimento:elemento.draggable.prop("id")
	},function(data){
		cont=data;
	});

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
				window.location="index.php";
			}else{
				sweetAlert("Oops!!!","Los datos son incorrectos o tal vez has olvidado activar tu cuenta!!!","error");
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
			swal("Es necesario llenar todos los campos!!!"); 
		}else{

			if(cont<=0)
			{
				swal("No hay productos");
				document.getElementById("rb_reservacion").checked=false;
				document.getElementById("rb_domicilio").checked=false;
			}
			else
			{
				//swal("Lo estamos redirigiendo a PayPal y descargando su recibo para finalizar la transaccion");
				var total=$("#lbl_total").text();
				var id_mesa=$("#txt_mesa_reservacion").prop('value');
				var fecha = $("#txt_fecha_reservacion").prop('value');
				var hora = $("#txt_hora_reservacion").prop('value');
				window.open("php/generar_pdf_reservacion.php?t="+total+"&m="+id_mesa+"&f="+fecha+"&h="+hora);
			}
		}

	}else{
		if(boolReservacion==false && boolDomicilio==true)
		{
			var latitud = $("#txt_latitud_pedido").prop("value");
			var longitud = $("#txt_longitud_pedido").prop("value");

			if(latitud.length<=0 || longitud.length<=0)
			{
				document.getElementById("rb_domicilio").checked=false;
				swal("Es necesario llenar todos los campos!!!");
				
			}else{
				//swal("Lo estamos redirigiendo a PayPal y descargando su recibo para finalizar la transaccion");
				var total=$("#lbl_total").text();
				var s=$("#txt_sucursal_pedido").prop("value");
				var lat = $("#txt_latitud_pedido").prop("value");
				var lon = $("#txt_longitud_pedido").prop("value");
				window.open("php/generar_pdf_pedido.php?t="+total+"&lat="+lat+"&lon="+lon+"&s="+s);
				
			}
			
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

function showModalRegistro()
{
	$("#modal_registro").modal();
}
function registrarCliente()
{
	var nombre = $("#txt_nombre_registro").prop("value");
	var telefono = $("#txt_telefono_registro").prop("value");
	var email = $("#txt_email_registro").prop("value");
	var rfc = $("#txt_rfc_registro").prop("value");
	var calle_numero = $("#txt_calle_registro").prop("value");
	var colonia = $("#txt_colonia_registro").prop("value");
	var municipio = $("#txt_municipio_registro").prop("value");
	var cp = $("#txt_cp_registro").prop("value");

	var contrasena = $("#txt_contrasena_registro").prop("value");
	var recontrasena = $("#txt_recontrasena_registro").prop("value");

	//Expresion regular para validar email
    var exp = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

	if(nombre.length<=0 || email.length<=0 || calle_numero.length<=0 || colonia.length<=0 ||municipio.length<=0 || cp.length<=0 || contrasena.length<=0 || recontrasena.length<=0)
	{
		swal("Los campos marcados con (*) son obligatorios ");
	}else{
		if(contrasena!=recontrasena)
		{
			swal("Oops!!! Parece q las contraseñas no coinciden!!!");
		}else{
			if(!exp.test(email.trim()))
			{
				swal("Ey, Ese no parece ser un e-mail valido !!!");
			}else{
				$.post("control/insert_cliente.php",
				{
				nombre:nombre,
				telefono:telefono,
				email:email,
				rfc:rfc,
				calle_numero:calle_numero, 
				colonia:colonia,
				municipio:municipio,
				cp:cp,
				contrasena:contrasena
				},function(data){
					swal(data);
					var nombre = $("#txt_nombre_registro").prop("value","");
					var telefono = $("#txt_telefono_registro").prop("value","");
					var email = $("#txt_email_registro").prop("value","");
					var rfc = $("#txt_rfc_registro").prop("value","");
					var calle_numero = $("#txt_calle_registro").prop("value","");
					var colonia = $("#txt_colonia_registro").prop("value","");
					var municipio = $("#txt_municipio_registro").prop("value","");
					var cp = $("#txt_cp_registro").prop("value","");

					var contrasena = $("#txt_contrasena_registro").prop("value","");
					var recontrasena = $("#txt_recontrasena_registro").prop("value","");
					$("#modal_registro").modal("hide");
				});
			}
		}
	}
}
function showRecuperacion()
{
	$("#modal_recuperacion").modal();
}
function recuperacion()
{
	var exp = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	var email = $("#txt_email_recuperacion").prop("value");
	if(!exp.test(email.trim()))
	{
		swal("Debes ingresar un email valido");
	}else{
		$.post("control/recuperacion.php",{email:email},function(data){
			swal(data);
			$("#modal_recuperacion").modal("hide");
		});
	}
	
}
function enviarMensaje()
{
	var asunto=$("#txt_asunto_contactanos").prop("value");
	var email=$("#txt_email_contactanos").prop("value");
	var mensaje=$("#txt_mensaje_contactanos").prop("value");
	var exp = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if(asunto.length<=0 || email.length<=0 || mensaje.length<=0)
	{
		swal("Debes llenar todos los campos!!!");
	}else{

	if(!exp.test(email.trim()))
	{
		swal("Debes ingresar un email valido!!!");
	}else{
		$.post("control/enviar_mensaje.php",{
			asunto:asunto,
			email:email,
			mensaje:mensaje
		},function(data){
			swal(data);
			window.location="index.php";
		});
	}
	}
}
function recargarLista()
{
	cargarPlatillos();
}