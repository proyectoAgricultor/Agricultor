<?php require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	$cdb 		= new base();
	$titulo		= verificar_texto($_POST['titulo']);
	$estatus 	= "1";
	$variables 	= array($titulo,$estatus);
	$tabla		= "clasificacion";
	$increment	= 1;
	$respuesta	= $cdb->insertar($variables, $tabla, $increment);

	echo json_encode($respuesta);

?>