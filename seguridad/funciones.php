<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/Agricultor/granlibreria.php");
	function comprobar_acceso($id_usuario, $acceso){
		$cdb= conecbase();
		$sql_acceso = "SELECT estatus FROM rol_acceso WHERE id_rol like (SELECT rol FROM usuario where id = '$id_usuario') AND id_acceso like '$acceso'";
		$exe_acceso = $cdb->query($sql_acceso);
		if($exe_acceso->num_rows>0){
			return 1;
		}else{
			return 0;
		}
	}
?>