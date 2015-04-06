<?php
	require_once("../granlibreria.php");
	$cdb 	= conecbase();
	$id 	= $_POST['id'];
	$url 	= "http://".$_SERVER['HTTP_HOST']."/pagina/pagina.php?pag=".modifica_numero($id);
	$sql 	= "SELECT * FROM pagina where id like '$id'";
	$exe 	= $cdb->query($sql);
	$data 	= $exe->fetch_array();	
	$arr = array("titulo"=>$data['titulo'], "informacion"=>$data['informacion'], "catalogo" => $data['catalogo'], "url" => $url, "estatus"=> $data['estatus']);
	echo json_encode($arr);
?>