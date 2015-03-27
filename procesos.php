<?php   
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("granlibreria.php");
	
	function verificar_texto($texto){

		$texto=str_replace("á", "&aacute;", $texto);
		$texto=str_replace("é", "&eacute;", $texto);
		$texto=str_replace("í", "&iacute;", $texto);
		$texto=str_replace("ó", "&oacute;", $texto);
		$texto=str_replace("ú", "&uacute;", $texto);
		$texto=str_replace("Á", "&Aacute;", $texto);
		$texto=str_replace("É", "&Eacute;", $texto);
		$texto=str_replace("Í", "&Iacute;", $texto);
		$texto=str_replace("Ó", "&Oacute;", $texto);
		$texto=str_replace("Ú", "&Uacute;", $texto);
		$texto=str_replace("ñ", "&ntilde;", $texto);
		$texto=str_replace("Ñ", "&Ntilde;", $texto);
		$texto=str_replace("?", "&#63;", $texto);
		$texto=str_replace("¿", "&iquest;", $texto);
		$texto=str_replace("insert", "",$texto);
		$texto=str_replace("update", "",$texto);
		$texto=str_replace("delete", "",$texto);
		$texto=str_replace("select", "",$texto);
		$texto=str_replace("(", "",$texto);
		$texto=str_replace("'", "",$texto);
		return $texto;
	}function regresar_acento($texto){

		$texto=str_replace("&aacute;", "á", $texto);
		$texto=str_replace("&eacute;", "é", $texto);
		$texto=str_replace("&iacute;", "í", $texto);
		$texto=str_replace("&oacute;", "ó", $texto);
		$texto=str_replace("&uacute;", "ú", $texto);
		$texto=str_replace("&Aacute;", "Á", $texto);
		$texto=str_replace("&Eacute;", "É", $texto);
		$texto=str_replace("&Iacute;", "Í", $texto);
		$texto=str_replace("&Oacute;", "Ó", $texto);
		$texto=str_replace("&Uacute;", "Ú", $texto);
		$texto=str_replace("&ntilde;", "ñ", $texto);
		$texto=str_replace("&Ntilde;", "Ñ", $texto);
		$texto=str_replace("&#63;", "?", $texto);
		$texto=str_replace("&iquest;", "¿", $texto);
		return $texto;
	}
	function modifica_numero($numero){
		$nuevo = $numero+2;
		if($nuevo%2==0){
			$nuevo=$nuevo/2;
			$nuevo="a".$nuevo;
		}
		else{
			$nuevo=$nuevo*3;		
			$nuevo="b".$nuevo;
		}
		return $nuevo;
	}
	function regresar_numero($texto){
		$resto=substr($texto,1);
		$resultado=0;
		if(substr($texto,0,1)=="a"){
			$resultado=$resto*2;
		}else if(substr($texto,0,1)=="b"){
			$resultado=$resto/3;
		}else{
			$resultado=2;
		}
		$resultado=$resultado-2;
		return $resultado;
	}
	function voltear_fecha($fecha){
		
		$arr 			= explode("-",$fecha);
		$fecha_volteada = $arr['2']."-".$arr['1']."-".$arr['0'];
		return $fecha_volteada;
	}
	function verificar_acceso($usuario,$acceso){
		$db = conecbase();
		if($acceso!=""){
			$sql = "SELECT id_rol FROM rol_acceso
				where id_rol = (SELECT rol FROM usuario where id = '$usuario' and estatus != '0')
				and id_acceso = (SELECT id FROM acceso where palabra = '$acceso') and estatus != '0'";
			$exe = $db->query($sql);
			if($exe->num_rows>0){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 1;
		}
		
	}

?>