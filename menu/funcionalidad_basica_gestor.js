$(document).ready(function(){
	var ruta_busqueda_modulo_seguridad = "../seguridad/acceso/busqueda.php";
	var estado = 0;
	$(".opciones_botonera").click(function(){
		$(".opciones_botonera").css("border-bottom", "0px solid white");
		$(this).css("border-bottom","5px solid silver");
	});

	$("#boton_insertar").click(function(){
		reiniciar();
		estado = 1;
		$("#contenedor_datos").css("display","block");

	});
	$("#boton_actualizar").click(function(){
		reiniciar();
		estado = 2;
		$("#contenedor_buscador").css("display", "block");
	});
	$("#boton_eliminar").click(function(){
		reiniciar();
		estado = 3;
		$("#contenedor_buscador").css("display", "block");
	});

	$("#boton_buscar").click(function(){
		$("#respuesta_busqueda").load("busqueda.php",{titulo: $("#titulo_buscar").val()},function(){

		});
	});

	$("#realizar_busqueda").click(function(){
		if($("#titulo_buscar").val()==""){
			alert("Debe de llenar el titulo");
		}else{
			
			$("#resultado_busqueda").html("Se esta procesando su busqueda...");
			$("#resultado_busqueda").load("busqueda.php" ,{titulo: $("#titulo_buscar").val()} , function(){
				$(".opcion_resultado").click(function(){
					$("#id_menu").val($(this).children(".id_respuesta").val());	
					$("#contenedor_buscador").css("display", "none");
					$("#contenedor_datos").css("display", "block");
							
					traer_datos();
				});
			});	
		}
		
	});
	function traer_datos(){
		
		$.ajax({
			type: 'post',
			url: 'traer_datos.php',
			dataType: 'json',
			data: {
				id: $("#id_menu").val()
			},
			success: function(res){
				$("#titulo_menu").val(res.titulo);
				$("#url_menu").val(res.url);
				$("#posicion_menu").val(res.posicion);
				$("#submenu").val(res.submenu);
				$("#publico_menu").val(res.publico);
				$("#acceso_menu").val(res.acceso);
				$("#estatus_menu").val(res.estatus);
			}
		});
	}

	$("#boton_ejecutar").click(function(){
		if(estado == 1){
			$.ajax({
				type: 'POST',
				url: 'enviar.php',
				dataType: 'json',
				data: {titulo: $("#titulo_menu").val(), url: $("#url_menu").val(), submenu: $("#submenu").val(), posicion: $("#posicion_menu").val(), publico: $("#publico_menu").val(), acceso: $("#acceso_menu").val(), estatus: $("#estatus_menu").val()},
				success: function(res){
					if(res.cod==1){
						alert(res.mensaje);

						$("#contenedor_datos").css("display","none");
						traer_menu($("#contenedor_menu"));
					}else{
						alert(res.mensaje);
					}
				}

			});
		}else if(estado == 2){
			$.ajax({
				type: 'POST',
				url: 'actualizar.php',
				dataType: 'json',
				data: {id: $("#id_menu").val(), titulo: $("#titulo_menu").val(), url: $("#url_menu").val(), submenu: $("#submenu").val(), posicion: $("#posicion_menu").val(), publico: $("#publico_menu").val(), acceso: $("#acceso_menu").val(), estatus: $("#estatus_menu").val()},
				success: function(res){
					if(res.cod==1){
						alert(res.mensaje);
						$("#contenedor_datos").css("display","none");
					}else{
						alert(res.mensaje);
					}
				}

			});
		}else if(estado == 3){
			$.ajax({
				type: 'POST',
				url: 'eliminar.php',
				dataType: 'json',
				data: {id: $("#id_menu").val()},
				success: function(res){
					if(res.cod==1){
						alert(res.mensaje);
						$("#contenedor_datos").css("display","none");
					}else{
						alert(res.mensaje);
					}
				}

			});
		}
	});
	
	function reiniciar(){
		$(".reiniciable").val("");
		$("#contenedor_datos").css("display","none");
		$("#contenedor_buscador").css("display","none");
	}

//funcionalidad propia de la pagina menu
	$("#publico_menu").change(function () {
		if($(this).val()==0){
			$("#contenedor_acceso").css("display","block");		
		}
	});

	$("#realizar_busqueda_acceso").click(function(){
			$("#resultado_busqueda_acceso").load(ruta_busqueda_modulo_seguridad ,{titulo: $("#titulo_buscar_acceso").val()} , function(){
				$(".opcion_resultado").click(function(){
					$("#acceso_menu").val($(this).children(".id_respuesta").val());
					$("#contenedor_buscador_acceso").css("display", "none");
				});
			});
		});
		$("#buscar_acceso").click(function(){
			$("#contenedor_buscador_acceso").css("display","block");
		});
		traer_menu($("#contenedor_menu"));
		function traer_menu(div){
			div.load("traer_menu.php",{},function(){
				
				$(".opcion_menu").click(function(){
					var id_menu = $(this).children(".identificador_opcion").val();
					$("#submenu").val(id_menu);
					
					
				});
			});
		}
//termina funcionalidad de la pagina menu
});