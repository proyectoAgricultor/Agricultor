<?php require_once("../../granlibreria.php");
	$cdb 		= conecbase();
	$titulo 	= verificar_texto($_POST['titulo']);

	$descripcion= verificar_texto($_POST['descripcion']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "INSERT INTO rol VALUES('', '$titulo', '$descripcion', '$estatus' )";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Se agrego correctamente ");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al agregar ".$cdb->error);
	}
	echo json_encode($arr);

?>