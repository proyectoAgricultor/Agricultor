$(document).ready(function(){
	var ruta_busqueda_modulo_seguridad = "../acceso/busqueda.php";
	var estado = 0;
	$(".opciones_botonera").click(function(){
		$(".opciones_botonera").css("border-bottom", "0px solid white");
		$(this).css("border-bottom","5px solid silver");
	});

	$("#boton_insertar").click(function(){
		reiniciar();
		estado = 1;
		$("#contenedor_datos").css("display","block");
		$(".contenedor_buscar").css("display", "none");
	});
	$("#boton_actualizar").click(function(){
		reiniciar();
		estado = 2;
		$("#contenedor_buscador").css("display", "block");
	});
	$("#boton_eliminar").click(function(){
		reiniciar();
		estado = 3;
		$(".contenedor_buscar").css("display", "none");
		$("#contenedor_buscador_rol_acceso").css("display", "block");
	});



	$("#realizar_busqueda").click(function(){
		if($("#titulo_buscar").val()==""){
			alert("Debe de llenar el titulo");
		}else{
			$("#resultado_busqueda").html("Se esta procesando su busqueda...");
			$("#resultado_busqueda").load("../rol/busqueda.php" ,{titulo: $("#titulo_buscar").val()} , function(){
				$(".opcion_resultado").click(function(){
					$("#id_rol").val($(this).children(".id_respuesta").val());	
					$("#contenedor_buscador").css("display", "none");
					$("#contenedor_datos").css("display", "block");
					
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
				id: $("#id_rol").val()
			},
			success: function(res){
				$("#titulo_rol").val(res.titulo);
				$("#descripcion_rol").val(res.descripcion);
				$("#estatus_rol").val(res.estatus);
			}
		});
	}

	$("#boton_ejecutar").click(function(){
		if(estado == 1){
			$.ajax({
				type: 'POST',
				url: 'enviar.php',
				dataType: 'json',
				data: {rol: $("#id_rol").val(), acceso: $("#id_acceso").val(), estatus: $("#estatus_rol_acceso").val()},
				success: function(res){
					if(res.cod==1){
						alert(res.mensaje);
						$("#contenedor_datos").css("display","none");
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
				data: {id: $("#id_rol").val(), titulo: $("#titulo_rol").val(), descripcion: $("#descripcion_rol").val(), estatus: $("#estatus_rol").val()},
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
				data: {rol: $("#id_rol").val(), acceso: $("#id_acceso").val()},
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

//funcionalidad propia de la pagina
	
	$("#realizar_busqueda_acceso").click(function(){
		$("#resultado_busqueda_acceso").load(ruta_busqueda_modulo_seguridad ,{titulo: $("#titulo_buscar_acceso").val()} , function(){
			$(".opcion_resultado").click(function(){
				$("#id_acceso").val($(this).children(".id_respuesta").val());
				$("#contenedor_buscador_acceso").css("display", "none");
			});
		});
	});
	$("#boton_buscar_acceso").click(function(){
		$("#contenedor_buscador_acceso").css("display","block");
	});
	
	$("#boton_buscar").click(function(){
		$("#contenedor_buscador").css("display","block");
	});
	

	$("#realizar_busqueda_rol_acceso").click(function(){
		$("#resultado_busqueda_rol_acceso").load("busqueda.php" ,{rol: $("#titulo_rol_buscar").val(), acceso: $("#titulo_acceso_buscar").val()} , function(){
			$(".opcion_resultado").click(function(){
				
				$("#id_rol").val($(this).children(".id_respuesta_rol").val());
				$("#id_acceso").val($(this).children(".id_respuesta_acceso").val());
				$("#contenedor_buscador_rol_acceso").css("display", "none");
				$("#contenedor_datos").css("display", "block");
			});
		});
	});
	


//termina funcionalidad de la pagina
});