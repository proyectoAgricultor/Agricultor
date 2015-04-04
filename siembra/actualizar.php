<?php require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	$cdb 		= new base();
	$id			= $_POST['id'];
	$titulo	 	= verificar_texto($_POST['titulo']);
	$variables 	= array("titulo"=>$titulo,"descripcion"=>$descripcion,"meses_cosecha"=>$meses_cosecha);
	$limitantes	= array("id"=>$id);
	$tabla		= "clasificacion";
	$respuesta	= $cdb->actualizar($variables,$limitantes,$tabla);
	echo json_encode($respuesta);
?>
