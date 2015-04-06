<?php	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	//session_start();
	//variables de entorno
	//
	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	encabezado("administracion de paginas","pagina_admin");
	?>	  
		<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
		<script type="text/javascript" src="funcionalidad_basica_gestor.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
		});
		</script>
		<link rel="stylesheet" type="text/css" href="../css/estilo_basico_gestores.css">
		<h2>Administraci&oacute;n de Paginas</h2>

		<div id="contenedor_botonera">
			<div class="opciones_botonera" id="boton_insertar">Insertar</div><div class="opciones_botonera" id="boton_actualizar">Actualizar</div><div class="opciones_botonera" id="boton_eliminar">Eliminar</div>
		</div>
		
			
		<div id="contenedor_buscador">
			<h2>Buscar Pagina</h2>
			<label>Titulo: </label><input type="text" id="titulo_buscar"><input type="button" id="realizar_busqueda" value="Buscar"><br>

			<div id="resultado_busqueda">

			</div>
		</div>
		<div id="contenedor_datos">
			<input type="hidden" value="" id="id_pagina" />
			<label>Titulo: </label><input type="text" id="titulo_pagina" class="descripcion reiniciable" /><br>
			<label>Informacion: </label><br>
				<div id="panel"></div>
				<div id="informacion_pagina"></div><br>
			<label>Es catalogo de productos: </label><select id="catalogo_pagina" class="codigo reiniciable"><option value="0">No</option><option value="1">Si</option></select><br>
			<label>url: </label><input type="text" id="url_pagina" class="descripcion reiniciable" /><br>

			<label>Estado: </label><select id="estatus_pagina"><option value="1">Activo</option><option value="2">Inactivo</option></select>
			<div id="boton_ejecutar">Guardar</div>
		</div>
		<style type="text/css">
			#informacion_pagina{
				
				
				min-height: 250px;
				border-left: 1px solid silver;
				border-right:  1px solid silver;
				border-bottom:  1px solid silver;
				overflow: auto;
			}#guardar{
				margin-top: 10px;
				margin-left: 10%;
				margin-bottom: 10px;
			}
			#cont{
				width: 100%;
			}#panel, #informacion_pagina{
				width: 98%;	
			}
		</style>
		<?php
			pie();
		?>