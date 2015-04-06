<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/Agricultorx/granlibreria.php");
	
	$cdb 	= new base();
	//$id 	= $_POST['id'];
	$seleccion	= array("*");
	$tabla		= array("PLAGA");
	$respuesta 	= $cdb->seleccionar($seleccion,$limitantes,$tabla);
	echo json_encode($respuesta);
?>