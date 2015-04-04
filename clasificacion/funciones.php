<?php 
	require_once("$_SERVER[DOCUMENT_ROOT]/granlibreria.php");
	function selector_clasificacion($identificador){
		$cdb 		= new base();
		$seleccion 	= array("id","titulo");
		$limitantes	= array("estatus"=>"1");
		$tabla		= array("clasificacion");
		$respuesta 	= $cdb->seleccionar($seleccion,$limitantes,$tabla);
		$string_respuesta="";
		if($respuesta['codigo']=="1"){
			$string_respuesta .= "<select id=$identificador >";
			$mensajes=$respuesta['mensaje'];
			for($i=0;$i<count($mensajes);$i++){
				$string_respuesta .= "<option value=".$mensajes[$i]['id'].">".$mensajes[$i]['titulo']."</option> ";
			}
			$string_respuesta .= "</select>";
		}else{
			$string_respuesta .= $respuesta['mensaje'];
		}
		
		echo $string_respuesta;	
	}
?>