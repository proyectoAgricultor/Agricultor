<?php require_once("../granlibreria.php");
	$cdb 			= conecbase();
	$id				= $_POST['id'];
	$titulo			= verificar_texto($_POST['titulo']);
	$informacion	= verificar_texto($_POST['informacion']);
	$catalogo		= verificar_texto($_POST['catalogo']);
	$estatus 		= verificar_texto($_POST['estatus']);

	$sql = "UPDATE pagina SET titulo = '$titulo', informacion = '$informacion', catalogo = '$catalogo', estatus = '$estatus' where id = '$id'";
	$cdb->query($sql);
	if($cdb->affected_rows>0){
		$arr = array("cod"=>'1',"mensaje"=>"Se actualizo correctamente ");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al actualizar ".$cdb->error);
	}
	echo json_encode($arr);

?>