<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	
	$cdb 	= new base();
	$id 	= $_POST['id'];
	$seleccion	= array("id", "titulo");
	$limitantes	= array("id"=>$id);
	$tabla		= array("clasificacion");
	$respuesta 	= $cdb->seleccionar($seleccion,$limitantes,$tabla);
	echo json_encode($respuesta);
?>