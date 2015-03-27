<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	$cdb	= new base();
	
	$titulo = verificar_texto($_POST['titulo']);
	$seleccionar 	= array("id","titulo");
	$limitantes		= array("titulo" => "%".$titulo."%", "estatus"=>"1");
	$tabla			= array("clasificacion");
	$respuesta 		= $cdb->seleccionar($seleccionar, $limitantes, $tabla);
	
	echo json_encode($respuesta);
?>