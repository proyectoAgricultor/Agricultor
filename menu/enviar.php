<?php require_once("../granlibreria.php");
	$cdb 		= conecbase();
	$titulo 	= verificar_texto($_POST['titulo']);
	$url 		= verificar_texto($_POST['url']);
	$submenu 	= verificar_texto($_POST['submenu']);
	$posicion 	= verificar_texto($_POST['posicion']);
	$publico 	= verificar_texto($_POST['publico']);
	$acceso 	= verificar_texto($_POST['acceso']);
	$estatus 	= verificar_texto($_POST['estatus']);

	$sql = "INSERT INTO menu VALUES('', '$titulo', '$url', ";
		if($submenu=="")
			$sql = $sql." NULL, ";
		else
			$sql = $sql."'$submenu', ";
		$sql = $sql."'$posicion', '$publico', ";
		if($acceso=="")
			$sql = $sql." NULL, ";
		else
			$sql = $sql."'$acceso', ";
		$sql = $sql."'$estatus')";

	
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Se agrego correctamente el menu");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al agregar el menu ".$cdb->error);
	}
	echo json_encode($arr);

?>