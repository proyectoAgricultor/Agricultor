<?php


	function conecbase(){
		
		$host="localhost";
		$base="pasteleria_ja";
		$usuario="pasteleria_front";
		$password="HrLxYj3U9ufmG4KS";
		$enlace = new mysqli($host, $usuario, $password,$base);         
		
		return $enlace;
	}
	
?>