<?php
	require_once("../../granlibreria.php");
	$cdb 	= conecbase();
	$id 	= $_POST['id'];
	$sql 	= "SELECT * FROM acceso where id like '$id'";
	$exe 	= $cdb->query($sql);
	$data 	= $exe->fetch_array();	
	$arr = array("titulo"=>$data['titulo'],"palabra"=>$data['palabra'], "descripcion" => $data['descripcion'], "estatus"=> $data['estatus']);
	echo json_encode($arr);
?>