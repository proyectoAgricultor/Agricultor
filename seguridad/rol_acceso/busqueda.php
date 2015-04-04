<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	require_once("../../granlibreria.php");
	$cdb	= conecbase();
	
	$rol 	= verificar_texto($_POST['rol']);
	$acceso = verificar_texto($_POST['acceso']);

	$sql	="SELECT r.id, r.titulo, a.id, a.titulo FROM rol_acceso as ra, rol as r, acceso as a where ra.id_rol IN (SELECT id from rol where titulo like '%$rol%') AND ra.id_acceso IN (SELECT id from acceso WHERE titulo like '%$acceso%') and ra.id_acceso = a.id and ra.id_rol = r.id and ra.estatus = '1'";
	
	$exe = $cdb->query($sql);
	while($data = $exe->fetch_array()){
		echo "
			<div class=opcion_resultado >
				<label>".$data[1]."</label><label>".$data[3]."</label><input type=hidden class=id_respuesta_rol value=\"".$data[0]."\" ><input type=hidden class=id_respuesta_acceso value=\"".$data[2]."\" >
			</div>";
	}
?>