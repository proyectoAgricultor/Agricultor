<?php
	require_once("../../granlibreria.php");
	$cdb 	= conecbase();
	$id 	= $_POST['id'];
	$sql 	= "SELECT * FROM rol where id like '$id'";
	$exe 	= $cdb->query($sql);
	$data 	= $exe->fetch_array();	
	$arr = array("titulo"=>$data['titulo'], "descripcion" => $data['descripcion'], "estatus"=> $data['estatus']);
	echo json_encode($arr);
?>