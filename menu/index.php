<?php	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	//session_start();
	//variables de entorno

		//$usuario = $_SESSION;
		$modulo_seguridad_activo = 1;
	//
	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	encabezado("administracion de menu","menu_admin");
	?>	  
		<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="funcionalidad_basica_gestor.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
		});
		</script>
		<link rel="stylesheet" type="text/css" href="../css/estilo_basico_gestores.css">
		<!--<link rel="stylesheet" type="text/css" href="tema_base_menu.css">-->
		<style type="text/css">
			#contenedor_acceso{
				display: none;
			}
			#contenedor_buscador_acceso{
				display: none;
			}
		</style>

		<h2>Administraci&oacute;n de Menus</h2>
		<div id="contenedor_botonera">
			<div class="opciones_botonera" id="boton_insertar">Insertar</div><div class="opciones_botonera" id="boton_actualizar">Actualizar</div><div class="opciones_botonera" id="boton_eliminar">Eliminar</div>
		</div>
		
		<div id="contenedor_buscador_acceso">
			<label>Titulo: </label><input type="text" id="titulo_buscar_acceso"><input type="button" id="boton_buscar" value="..."><button id="realizar_busqueda_acceso">Buscar</button><br>

			<div id="resultado_busqueda_acceso">

			</div>
		</div>

		<div id="contenedor_menu">
			
		</div>	
		<div id="contenedor_buscador">
			<label>Titulo: </label><input type="text" id="titulo_buscar"><input type="button" id="realizar_busqueda" value="Buscar"><br>

			<div id="resultado_busqueda">

			</div>
		</div>
		<div id="contenedor_datos">
			<input type="hidden" value="" id="id_menu" />
			<label>Titulo: </label><input type="text" id="titulo_menu" class="descripcion reiniciable" /><br>
			<label>URL de pagina: </label><input type="text" id="url_menu" class="descripcion reiniciable" /><br>
			<label>Es submenu de : </label><input type="text" id="submenu" class="codigo reiniciable" /><br>
			<label>Posicion a mostrar: </label><input type="number" id="posicion_menu" class="reiniciable codigo" /><br>
			<?
			if($modulo_seguridad_activo==1){
			?>
				<label>Es publico: </label><select id="publico_menu"><option value="1">Si</option><option value="0">No</option></select><br>
				<div id="contenedor_acceso"><label>Acceso que necesita: </label><input type="text" id="acceso_menu" class="codigo reiniciable" /><input type="button" id="buscar_acceso" value="..." /></div><br>
			<?
			}else{
				?>
					<input type="hidden" id="publico_menu" value="1">
					<input type="hidden" id="acceso_menu" value="0">
				<?
			}
			?>
			<label>Publicar: </label><select id="estatus_menu"><option value="1">Si</option><option value="2">No</option></select>
			<div id="boton_ejecutar">Guardar</div>
		</div>
		
		<?php
			pie();
		?>