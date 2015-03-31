<?php
	Class base{
		protected $coneccion	= array();
		protected $cantidad		= 0;
		protected $ordenamiento = "id";
		protected $or 			= "";
		protected $negacion		= "";
		protected $forma = "asc";
		function base(){
			$host="localhost";
			$base="agrappserv";
			$usuario="agrappserv";
			$password="agrappserv";
			$enlace = new mysqli($host, $usuario, $password,$base);           
			$this->coneccion = $enlace;
		}
		function insertar($variables, $tabla, $increment){
			$sql 	= "INSERT INTO $tabla VALUES("; //se inicia con la sentensia sql del insert y se especifica la tabla.
			if(count($variables)>0){	//verifico que vengan valores para ingresar
				if($increment==1){
					$sql .= "'', ";
				}
				foreach ($variables as $valor) {
					if($valor==""){
						$sql .= "NULL , ";	
					}else{
						$sql .= "'".$valor."', ";	
					}
					
				}	
				$sql = substr($sql, 0, -2);
				$sql .=")";
				if($this->coneccion->query($sql)){
					if($this->coneccion->affected_rows>0){
						if($increment==1)
							$respuesta = array("codigo"=>'1',"mensaje"=>$this->coneccion->insert_id);	
						else
							$respuesta = array("codigo"=>'1',"mensaje"=>$this->coneccion->affected_rows);
					}else{
						$respuesta = array("codigo"=>'0',"mensaje"=>"No afecto registros: ".$this->coneccion->error);	
					}	
				}else{
					$respuesta = array("codigo"=>'0',"mensaje"=>"Ocurrio un error al realizar el query: $sql ".$this->coneccion->error);	
				}
			}else{
				$respuesta = array("codigo"=>'0',"mensaje"=>"El arreglo de ingreso viene vacio");
			}
			return $respuesta;
		}
		function eliminar($columna,$identificador,$tabla,$logico){
			if($logico==0)
				$sql = "DELETE FROM $tabla WHERE $columna = '$identificador'";
			else
				$sql = "UPDATE $tabla SET estatus = '0' WHERE $columna = '$identificador'";

			if($this->coneccion->query($sql)){
				if($this->coneccion->affected_rows>0){
					$respuesta = array("codigo"=>'1',"mensaje"=>$this->coneccion->affected_rows);
				}else{
					$respuesta = array("codigo"=>'0',"mensaje"=>"No afecto registros: ".$this->coneccion->error);	
				}	
			}else{
				$respuesta = array("codigo"=>'0',"mensaje"=>"Ocurrio un error al realizar el query: ".$this->coneccion->error);	
			}
			return $respuesta;
		}
		function eliminar_complejo($limitantes,$tabla,$logico){
			if($logico==0)
				$sql = "DELETE FROM $tabla WHERE ";
			else
				$sql = "UPDATE $tabla SET estatus = '0' WHERE ";
			
			foreach ($limitantes as $clave => $valor) {
				$sql .= "$clave = '$valor' AND ";
			}
			$sql = substr($sql, 0, -5);
			
			if($this->coneccion->query($sql)){
				if($this->coneccion->affected_rows>0){
					$respuesta = array("codigo"=>'1',"mensaje"=>$this->coneccion->affected_rows);
				}else{
					$respuesta = array("codigo"=>'0',"mensaje"=>"No afecto registros: ".$this->coneccion->error);	
				}	
			}else{
				$respuesta = array("codigo"=>'0',"mensaje"=>"Ocurrio un error al realizar el query: ".$this->coneccion->error);	
			}
			return $respuesta;
		}
		
		function actualizar($variables,$limitantes,$tabla){
			$sql = "UPDATE $tabla SET ";
			foreach ($variables as $clave => $valor) {
				$sql .= "$clave = '$valor', ";
			}
			$sql = substr($sql, 0, -2);
			$sql .= " WHERE ";
			foreach ($limitantes as $clave => $valor) {
				$sql .= "$clave = '$valor' and ";
			}
			$sql = substr($sql, 0, -5);

			if($this->coneccion->query($sql)){
				if($this->coneccion->affected_rows>0){
					$respuesta = array("codigo"=>'1',"mensaje"=>$this->coneccion->affected_rows);
				}else{
					$respuesta = array("codigo"=>'2',"mensaje"=>"No afecto registros: ".$this->coneccion->error);	
				}	
			}else{
				$respuesta = array("codigo"=>'0',"mensaje"=>"Ocurrio un error al realizar el query: ".$this->coneccion->error);	
			}
			return $respuesta;	
		}
		function set_extras_seleccionar($cantidad,$ordenamiento,$forma){
			if($cantidad!="")
				$this->cantidad			= $cantidad;
			if($ordenamiento!="")
				$this->ordenamiento		= $ordenamiento;
			if($forma!="")
				$this->forma 			= $forma;
		}function agregar_or($variables){
			$sql = "";
			if(count($variables)>0){
				$sql .= " OR ";
				foreach ($variables as $clave => $valor) {
					$sql .= "$clave like ";
					if(strpos($valor, ".")){
						$sql .="$valor";
					}else{
						$sql .="'$valor'";
					}
					$sql .= " or ";
				}
				$sql = substr($sql, 0, -4);
			}
			$this->or .= $sql;
		}
		function agregar_negacion($variables){
			$sql = "";
			if(count($variables)>0){
				$sql .= " and ";
				foreach ($variables as $clave => $valor) {
					$sql .= "$clave != ";
					if(strpos($valor, ".")){
						$sql .="$valor";
					}else{
						$sql .="'$valor'";
					}
					$sql .= " and ";
				}
				$sql = substr($sql, 0, -5);
			}
			$this->negacion .= $sql;
		}
		function iniciar_transaccion(){
			$sql = "START TRANSACTION";
			if($this->coneccion->query($sql)){
				return 1;
			}else{
				return "error al iniciar transaction ".$this->coneccion->error;
			}
		}
		function confirmar_transaccion(){
			$sql = "COMMIT";
			if($this->coneccion->query($sql)){
				return 1;
			}else{
				return "error al hacer commit ".$this->coneccion->error;
			}	
		}
		function regresar_transaccion(){
			$sql = "ROLLBACK";
			if($this->coneccion->query($sql)){
				return 1;
			}else{
				return "error al hacer rollback ".$this->coneccion->error;
			}	
		}
		

		function seleccionar($seleccion,$limitantes,$tabla){			
			$sql = "SELECT ";
			foreach ($seleccion as $valor) {
				$sql .= "$valor, ";
			}
			$sql = substr($sql, 0, -2);
			$sql .= " FROM ";
			foreach ($tabla as $valor) {
				$sql .= "$valor, ";
			}
			$sql = substr($sql, 0, -2);

			if(count($limitantes)>0){
				$sql .= " WHERE ";
				foreach ($limitantes as $clave => $valor) {
					$sql .= "$clave like ";
					if(strpos($valor, ".")){
						$sql .="$valor";
					}else{
						$sql .="'$valor'";
					}
					$sql .= " and ";
				}
				$sql = substr($sql, 0, -5);
			}
			if($this->or!=""){
				$sql .= " ".$this->or;
			}
			if($this->negacion !=""){
				$sql .= " ".$this->negacion;
			}
			$sql .= " ORDER BY ".$this->ordenamiento." ".$this->forma;
			if($this->cantidad>0){
				$sql.=" limit ".$this->cantidad;
			}
			$exe = $this->coneccion->query($sql);
			if($exe){
				if($exe->num_rows>0){
					
					for($i=0;$i<$exe->num_rows;$i++){
						$data = $exe->fetch_assoc();
						$datos[$i]=$data;
					}
					
					$respuesta = array("codigo"=>'1', "mensaje"=>$datos);
				}else{
					$respuesta = array("codigo"=>'2', "mensaje"=>"No hay registros"." QUERY: ".$sql);	
				}	
			}else{
				$respuesta = array("codigo"=>'0', "mensaje"=>"Ocurrio un error al realizar el query: ".$this->coneccion->error." QUERY: ".$sql);	
			}
			return $respuesta;	
		}
	}
?>
