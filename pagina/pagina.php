<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	require_once("$_SERVER[DOCUMENT_ROOT]/producto/funciones.php");
	$cdb = conecbase();
	
		if(isset($_GET['pag'])){
			$sql = "SELECT id, titulo, informacion, catalogo from pagina where id = '".regresar_numero($_GET['pag'])."'";
			$exe = $cdb->query($sql);
			if($exe->num_rows>0){
				$dat = $exe->fetch_array();
				encabezado($dat['titulo'],"");
				echo "<div id=titulo_pagina ><h2>".$dat['titulo']."</h2></div>";
				echo "<div id=cuerpo_pagina >".$dat['informacion']."</div>";
				if($dat['catalogo']>0)
					traer_productos($dat['catalogo']);
				
			}else{
				encabezado("Pagina no existe","");
				echo "Pagina no existe";
			}
		}else{
			encabezado("Pagina no existe","");
			echo "Error en url";
		}
	pie();
?>