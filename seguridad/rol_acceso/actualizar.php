<?php require_once("../../granlibreria.php");
	$cdb 		= conecbase();
	$id			= $_POST['id'];
	$titulo 	= verificar_texto($_POST['titulo']);

	$descripcion= verificar_texto($_POST['descripcion']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "UPDATE rol SET titulo = '$titulo', descripcion = '$descripcion', estatus = '$estatus' where id = '$id'";
	$cdb->query($sql);
	if($cdb->affected_rows>0){
		$arr = array("cod"=>'1',"mensaje"=>"Se actualizo correctamente ");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al actualizar ".$cdb->error);
	}
	echo json_encode($arr);

?>