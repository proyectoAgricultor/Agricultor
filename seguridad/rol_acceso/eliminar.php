<?php require_once("../../granlibreria.php");
	$cdb 	= conecbase();
	$rol 	= $_POST['rol'];
	$acceso	= $_POST['acceso'];	
	$sql = "UPDATE rol_acceso SET estatus = '0' where id_rol = '$rol' and id_acceso = '$acceso'";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Eliminacion Correcta");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al eliminar ".$cdb->error);
	}
	echo json_encode($arr);

?>