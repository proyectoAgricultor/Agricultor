<?php 	
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	require_once("$_SERVER[DOCUMENT_ROOT]/seguridad/funciones.php");
	
	
	function traer_menu_admin(){
		$cdb = conecbase();
		$sql = "select id, titulo from menu where menu_padre IS NULL and estatus != '0' ";
		$exe = $cdb->query($sql);
		$string_resultado = "";
		while($data = $exe->fetch_array()){
			$string_resultado .= "<div class=contenedor_opcion_principal ><li class=\"opcion_principal_menu opcion_menu\" ><input type=hidden class=identificador_opcion value=\"".$data['id']."\" ><label>".$data['titulo']."</label></li>";
			$sql_submenu = "select id, url, titulo, publico, acceso from menu where menu_padre like '".$data['id']."'";
			$exe_submenu = $cdb->query($sql_submenu);
			if($exe_submenu->num_rows>0){
				$string_resultado .= "<ul class=contenedor_opcion_secundaria_menu >";

				while($data_submenu = $exe_submenu->fetch_array()){
						$string_resultado .= "<li class=\"opcion_secundaria_menu opcion_menu\" ><input type=hidden class=identificador_opcion value=\"".$data_submenu['id']."\" ><label>".$data_submenu['titulo']."</label></li>";	
				}
				$string_resultado .= "</ul>";
			}
			$string_resultado .="</div>";
		}
		echo $string_resultado;
	}
	function traer_menu($id_usuario){
		
		$cdb = conecbase();
		$paso = 0;
		$sql = "select id, url, titulo, publico, acceso from menu where menu_padre IS NULL and estatus != '0' order by posicion asc";
		$exe = $cdb->query($sql);
		$string_resultado = "";
		while($data = $exe->fetch_array()){
			if($data['publico']==0){
				if(comprobar_acceso($id_usuario, $data['acceso'])>0){
					$paso = 1;
				}	
			}else{
				$paso = 1;
			}

			if($paso == 1){
				$string_resultado .= "<div class=contenedor_opcion_principal ><li class=\"opcion_principal_menu opcion_menu\" ><a href='".$data['url']."' >".$data['titulo']."</a></li>";
				$sql_submenu = "select url, titulo, publico, acceso from menu where menu_padre like '".$data['id']."' and estatus != '0'";
				$exe_submenu = $cdb->query($sql_submenu);
				if($exe_submenu->num_rows>0){
					$paso = 0;
					$string_resultado .= "<ul class=contenedor_opcion_secundaria_menu >";
					while($data_submenu = $exe_submenu->fetch_array()){
						if($data_submenu['publico']==0){
							if(comprobar_acceso($id_usuario, $data_submenu['acceso'])>0){
								$paso = 1;
							}	
						}else{
							$paso = 1;
						}
						if($paso == 1){
							$string_resultado .= "<li class=\"opcion_secundaria_menu opcion_menu\" ><a href='".$data_submenu['url']."' >".$data_submenu['titulo']."</a></li>";
							$paso = 0;
						}
					}
					$string_resultado .= "</ul>";
				}
				$string_resultado .="</div>";
				$paso = 0;
			}
				
		}
		echo $string_resultado;
	}
	/*function comprobar_acceso($id_usuario, $acceso){
		$cdb= conecbase();
		$sql_acceso = "SELECT estatus FROM rol_acceso WHERE id_rol like (SELECT rol FROM usuario where id = '$id_usuario') AND id_acceso like '$acceso'";
		$exe_acceso = $cdb->query($sql_acceso);
		if($exe_acceso->num_rows>0){
			return 1;
		}else{
			return 0;
		}
	}*/
?>