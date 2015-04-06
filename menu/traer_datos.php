<?php
	require_once("../granlibreria.php");
	$cdb 	= conecbase();
	$id 	= $_POST['id'];
	$sql 	= "SELECT * FROM menu where id like '$id'";
	$exe 	= $cdb->query($sql);
	$data 	= $exe->fetch_array();	
	$arr = array("titulo"=>$data['titulo'],"url"=>$data['url'], "submenu" => $data['menu_padre'], "posicion"=> $data['posicion'], "publico"=>$data['publico'],"acceso"=>$data['acceso'], "estatus"=>$data['estatus']);
	echo json_encode($arr);
?>