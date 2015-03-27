<?php require_once("../granlibreria.php");
	$cdb 			= conecbase();
	$titulo 		= verificar_texto($_POST['titulo']);
	$informacion 	= verificar_texto($_POST['informacion']);
	$catalogo		= verificar_texto($_POST['catalogo']);
	$estatus		= verificar_texto($_POST['estatus']);
	$hoy			= date('Y-m-d');

	$sql = "INSERT INTO pagina VALUES('', '$titulo', '$informacion', '$catalogo','$hoy', '$estatus' )";
	if($cdb->query($sql)){
		$arr = array("cod"=>'1',"mensaje"=>"Se agrego correctamente");
	}else{
		$arr = array("cod"=>'0',"mensaje"=>"Error al agregar ".$cdb->error);
	}
	echo json_encode($arr);

?>