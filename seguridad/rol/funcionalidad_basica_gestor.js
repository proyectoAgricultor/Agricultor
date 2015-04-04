$(document).ready(function(){
	
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
					$("#id_rol").val($(this).children(".id_respuesta").val());	
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
				data: {titulo: $("#titulo_rol").val(), descripcion: $("#descripcion_rol").val(), estatus: $("#estatus_rol").val()},
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
				data: {id: $("#id_rol").val()},
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
	

		
//termina funcionalidad de la pagina menu
});