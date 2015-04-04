<?php require_once("../granlibreria.php");
	$cdb 		= conecbase();
	$id			= $_POST['id'];
	$titulo 	= verificar_texto($_POST['titulo']);
	$url 		= verificar_texto($_POST['url']);
	$submenu 	= verificar_texto($_POST['submenu']);
	$posicion 	= verificar_texto($_POST['posicion']);
	$publico 	= verificar_texto($_POST['publico']);
	$acceso 	= verificar_texto($_POST['acceso']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "UPDATE menu SET titulo = '$titulo', url = '$url', ";
	if($submenu == "") $sql = $sql."menu_padre = NULL, ";
	else $sql=$sql."menu_padre = '$submenu', ";
	if($acceso == "") $sql = $sql."acceso = NULL, ";
	else $sql = $sql."acceso = '$acceso', ";
	$sql = $sql." posicion = '$posicion', publico = '$publico', estatus = '$estatus' where id = '$id'";
	$cdb->query($sql);
	if($cdb->affected_rows>0){
		$arr = array("cod"=>'1',"mensaje"=>"Se actualizo correctamente el menu");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al actualizar el menu ".$cdb->error);
	}
	echo json_encode($arr);

?>