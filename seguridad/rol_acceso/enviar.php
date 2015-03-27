<?php require_once("../../granlibreria.php");
	$cdb 		= conecbase();
	$rol 		= verificar_texto($_POST['rol']);
	$acceso 	= verificar_texto($_POST['acceso']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "INSERT INTO rol_acceso VALUES('$rol', '$acceso', '$estatus' )";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Se agrego correctamente ");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al agregar ".$cdb->error);
	}
	echo json_encode($arr);

?>