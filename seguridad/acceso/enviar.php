<?php require_once("../../granlibreria.php");
	$cdb 		= conecbase();
	$titulo 	= verificar_texto($_POST['titulo']);
	$palabra 	= verificar_texto($_POST['palabra']);
	$descripcion= verificar_texto($_POST['descripcion']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "INSERT INTO acceso VALUES('', '$titulo', '$palabra', '$descripcion', '$estatus' )";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Se agrego correctamente el acceso");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al agregar el menu ".$cdb->error);
	}
	echo json_encode($arr);

?>