<?php 	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	
	function buscador_acceso_simple($colocar_texto,$colocar_id){
		?>
			<div class="boton_activar_buscador" id="activar_buscador_acceso_simple">...</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#activar_buscador_acceso_simple").click(function(){
						$("#contenedor_buscador_acceso_simple").css("display","block");
					});
					$("#realizar_busqueda_acceso_simple").click(function(){
						if($("#titulo_buscar_acceso_simple").val()==""){
							alert("Debe de llenar el titulo");
						}else{
							$("#resultado_busqueda_acceso_simple").html("Se esta procesando su busqueda...");
							$("#resultado_busqueda_acceso_simple").load(<?php echo "\"http://$_SERVER[HTTP_HOST]/seguridad/acceso/busqueda.php\""; ?> ,{titulo: $("#titulo_buscar").val()} , function(){
								$(".opcion_resultado").click(function(){
									$(<?php echo "\"#".$colocar_id."\"";?>).val($(this).children(".id_respuesta").val());
									$(<?php echo "\"#".$colocar_texto."\"";?>).html($(this).children("label").html());	
									$("#contenedor_buscador_acceso_simple").css("display","none");
								});
							});	
						}
						
					});
				});
			</script>
			<div class="contenedor_buscador" id="contenedor_buscador_acceso_simple">
				<h2>Buscar accesos</h2>
				<label>Titulo de acceso: </label><input type="text" id="titulo_buscar_acceso_simple"><div class="boton_buscar" id="realizar_busqueda_acceso_simple">Buscar</div><br>

				<div class="resultado_buscador" id="resultado_busqueda_acceso_simple">

				</div>
			</div>
		<?php
	}function multiples_accesos(){
		?>
			<script type="text/javascript">
				$(document).ready(function(){
					var linea_activa; 
					$("body").on("click", ".boton_buscar_acceso", function(){
						linea_activa = $(this).parent().children(".codigo_acceso");
						$("#contenedor_buscador_acceso_simple").css("display","block");
					});
					$("#realizar_busqueda_acceso_simple").click(function(){
						if($("#titulo_buscar_acceso_simple").val()==""){
							alert("Debe de llenar el titulo");
						}else{
							$("#resultado_busqueda_acceso_simple").html("Se esta procesando su busqueda...");
							$("#resultado_busqueda_acceso_simple").load(<?php echo "\"http://$_SERVER[HTTP_HOST]/seguridad/acceso/busqueda.php\""; ?> ,{titulo: $("#titulo_buscar").val()} , function(){
								$(".opcion_resultado").click(function(){
									linea_activa.parent().children(".codigo_acceso").val($(this).children(".id_respuesta").val());
									linea_activa.parent().children(".titulo_acceso").html($(this).children("label").html());	
									$("#contenedor_buscador_acceso_simple").css("display","none");
								});
							});	
						}
						
					});
					$("#agregar_linea").click(function(){
						agregar_linea();
					});
					
					$("body").on("click", ".boton_eliminar_linea_acceso", function(){
						eliminar_linea($(this).parent());
					});
					function agregar_linea(){
						var vacios = 0;
						$(".codigo_acceso").each(function(){
							if($(this).val()==""){
								vacios++;
							}
						});
						if(vacios==0){
							linea = "<div class=linea_multiple_acceso ><input type=text id=codigo_acceso class=codigo_acceso ><label class=titulo_acceso></label><div class=boton_buscar_acceso >Buscar </div><div class=boton_eliminar_linea_acceso >Eliminar</div></div>";
							$("#contenedor_multiples_accesos").append(linea);
						}
					}function eliminar_linea(index){
						index.remove();
					}
				});
			</script>
			<div class="contenedor_buscador" id="contenedor_buscador_acceso_simple">
				<h2>Buscar accesos</h2>
				<label>Titulo de acceso: </label><input type="text" id="titulo_buscar_acceso_simple"><div class="boton_buscar" id="realizar_busqueda_acceso_simple">Buscar</div><br>

				<div class="resultado_buscador" id="resultado_busqueda_acceso_simple">

				</div>
			</div>
			<div id="contenedor_multiples_accesos">
				<div class="linea_opciones_multiples"><div id="agregar_linea">Agregar linea</div></div>
			</div>
		<?php
	}	
?>