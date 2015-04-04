<?php require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	$cdb 			= new base();
	$id 			= $_POST['id'];
	$limitantes		= array("id"=>$id);
	$tabla			= "siembra";
	$logico			= 1;
	$respuesta = $cdb->eliminar_complejo($limitantes,$tabla,$logico);
	
	echo json_encode($respuesta);
?>
