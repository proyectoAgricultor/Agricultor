<?php


	function conecbase(){
		
		$host="localhost";
		$base="agrappserv";
		$usuario="agrappserv";
		$password="agrappserv";
		$enlace = new mysqli($host, $usuario, $password,$base);         
		
		return $enlace;
	}
	
?>
