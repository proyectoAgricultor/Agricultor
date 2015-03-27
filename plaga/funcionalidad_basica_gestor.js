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

	

	$("#realizar_busqueda").click(function(){
		if($("#titulo_buscar").val()==""){
			alert("Debe de llenar el titulo");
		}else{
			
			$("#resultado_busqueda").html("Se esta procesando su busqueda...");
			$.ajax({
				type: 'post',
				url: 'busqueda.php',
				dataType: 'json',
				data: {titulo: $("#titulo_buscar").val()},
				success: function(res){
					$("#resultado_busqueda").html("");
					if(res.codigo=="1"){
						var rs = "";
						var mensaje = res.mensaje;
						for(i=0;i<mensaje.length;i++){
							rs = rs + "	<div class=opcion_resultado><label>"+mensaje[i]['titulo']+"</label><input type=hidden class=id_respuesta value="+mensaje[i]['id']+" ></div>";
						}
						$("#resultado_busqueda").html(rs);
					}else{
						alert(res.mensaje);
					}		
				},error: function(res){
					alert(res['codigo']);
				}

			});	
		}
		
	});
	$("body").on('click', "#resultado_busqueda .opcion_resultado", function(){
		$("#id_garantia").val($(this).children(".id_respuesta").val());	
		$("#contenedor_buscador").css("display", "none");
		$("#contenedor_datos").css("display", "block");
		$("#boton_ejecutar").css("display","block");
		traer_datos();
	});
	function traer_datos(){
		
		$.ajax({
			type: 'post',
			url: 'traer_datos.php',
			dataType: 'json',
			data: {
				id: $("#id_garantia").val()
			},
			success: function(res){
				var mensaje = res.mensaje[0];
				
				$("#titulo").val(mensaje['titulo']);
				$("#estatus").val(mensaje['estatus']);
			}
		});
	}

	$("#boton_ejecutar").click(function(){
		$(this).css("display","none");
		if(estado == 1){
			$.ajax({
				type: 'POST',
				url: 'enviar.php',
				dataType: 'json',
				data: {titulo: $("#titulo").val()},
				success: function(res){
					$("#boton_ejecutar").css("display","block");
					if(res.codigo==1){
						alert("Ingreso Correcto");
						reiniciar();

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
				data: {id: $("#id").val(), titulo: $("#titulo").val()},
				success: function(res){
					$("#boton_ejecutar").css("display","block");
					if(res.codigo==1){
						alert("Actualizacion correcta");
						reiniciar();

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
				data: {id: $("#id").val()},
				success: function(res){
					$("#boton_ejecutar").css("display","block");
					if(res.codigo==1){
						alert("Eliminacion correcta");
						reiniciar();
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
		$("#resultado_busqueda").html("");
	}

//funcionalidad propia de la pagina menu
//termina funcionalidad de la pagina menu
});