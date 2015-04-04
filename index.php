<?php
	require_once("$_SERVER[DOCUMENT_ROOT]/Agricultor/granlibreria.php");
	//require_once("$_SERVER[DOCUMENT_ROOT]/Agricultor/producto/funciones.php");
	$cdb = conecbase();
	
		
			$sql = "SELECT id, titulo, informacion, catalogo from pagina where id = '".regresar_numero("a3")."'";
			$exe = $cdb->query($sql);
                        
                        echo $exe->fetch_array();
                        
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
		
	pie();
?>