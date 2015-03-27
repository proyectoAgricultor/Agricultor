<?php	//session_start();
	//variables de entorno
		$usuario = 1;
		
	//
	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	encabezado("administracion de roles","rol_admin");
	?>	  
		<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="funcionalidad_basica_gestor.js"></script>
		
		
		<link rel="stylesheet" type="text/css" href="../../css/estilo_basico_gestores.css">
		<h2>Administraci&oacute;n de Roles </h2>

		<div id="contenedor_botonera">
			<div class="opciones_botonera" id="boton_insertar">Insertar</div><div class="opciones_botonera" id="boton_actualizar">Actualizar</div><div class="opciones_botonera" id="boton_eliminar">Eliminar</div>
		</div>
		
			
		<div id="contenedor_buscador">
			<label>Titulo: </label><input type="text" id="titulo_buscar"><input type="button" id="realizar_busqueda" value="Buscar"><br>

			<div id="resultado_busqueda">

			</div>
		</div>
		<div id="contenedor_datos">
			<input type="hidden" value="" id="id_rol" />
			<label>Titulo: </label><input type="text" id="titulo_rol" class="descripcion reiniciable" /><br>
			<label>Descripcion: </label><input type="text" id="descripcion_rol" class="descripcion reiniciable" /><br>
			<label>Estado: </label><select id="estatus_rol"><option value="1">Activo</option><option value="2">Inactivo</option></select>
			<div id="boton_ejecutar">Guardar</div>
		</div>
<?php 
	pie();
?>	
		