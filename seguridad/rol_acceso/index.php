<?php	//session_start();
	//variables de entorno
		$usuario = 1;
		
	//
	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	encabezado("administracion de accesos por rol","rol_acceso_admin");
	?>	  
		<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="funcionalidad_basica_gestor.js"></script>
		
		
		<link rel="stylesheet" type="text/css" href="../../css/estilo_basico_gestores.css">
		<h2>Administraci&oacute;n de Accesos en Roles </h2>

		<div id="contenedor_botonera">
			<div class="opciones_botonera" id="boton_insertar">Insertar</div><div class="opciones_botonera" id="boton_eliminar">Eliminar</div>
			<!--<div class="opciones_botonera" id="boton_actualizar">Actualizar</div>-->
		</div>
		
			
		<div class="contenedor_buscar" id="contenedor_buscador">
			<h2>Buscar Roles</h2>
			<label>Titulo: </label><input type="text" id="titulo_buscar"><input type="button" id="realizar_busqueda" value="Buscar"><br>

			<div id="resultado_busqueda">

			</div>
		</div>
		<div class="contenedor_buscar" id="contenedor_buscador_acceso">
			<h2>Buscar Accesos </h2>
			<label>Titulo: </label><input type="text" id="titulo_buscar_acceso"><input type="button" id="realizar_busqueda_acceso" value="..."><br>

			<div class="resultado_buscar" id="resultado_busqueda_acceso">

			</div>
		</div>
		<div class="contenedor_buscar" id="contenedor_buscador_rol_acceso">
			<h2>Buscar Accesos por Role</h2>
			<label>Role: </label><input type="text" id="titulo_rol_buscar"><label>Acceso: </label><input type="text" id="titulo_acceso_buscar" ><input type="button" id="realizar_busqueda_rol_acceso" value="Buscar"><br>

			<div class="resultado_buscar" id="resultado_busqueda_rol_acceso">

			</div>
		</div>

		<div id="contenedor_datos">
			<label>Role : </label><input type="text" id="id_rol" class="codigo reiniciable"><input type="button" id="boton_buscar" value="..."><br>
			<label>Acceso: </label><input type="text" id="id_acceso" class="codigo reiniciable" ><input type="button" id="boton_buscar_acceso" value="..."><br>
			<label>Estado: </label><select id="estatus_rol_acceso"><option value="1">Activo</option></select>
			<div id="boton_ejecutar">Guardar</div>
		</div>
<?php 
	pie();
?>		