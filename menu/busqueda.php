<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("../granlibreria.php");

	$cdb	= conecbase();
	$titulo = verificar_texto($_POST['titulo']);
	$sql	="SELECT id, titulo FROM menu where titulo like '%$titulo%' and estatus != '0'";
	
	$exe = $cdb->query($sql);
	if($exe->num_rows==0) echo "No hay resultados";
	while($data = $exe->fetch_array()){
		echo "
			<div class=opcion_resultado >
				<label>".$data['titulo']."</label><input type=hidden class=id_respuesta value=\"".$data['id']."\" >
			</div>";
	}
?>