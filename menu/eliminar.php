<?php require_once("../granlibreria.php");
	$cdb 	= conecbase();
	$id 	= $_POST['id'];
	
	$sql = "UPDATE menu SET estatus = '0' where id = '$id'";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Eliminacion Correcta");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al eliminar el menu ".$cdb->error);
	}
	echo json_encode($arr);

?>