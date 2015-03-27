<?php 	session_start();
	require_once("menu/funciones.php");
	require_once("estadisticas/funciones.php");
	require_once("granlibreria.php");

	
	function encabezado($titulo,$acceso){
		
		$url = $_SERVER['REQUEST_URI'];
		$url = explode("/",$url);
		$pagina = end($url);
		if($pagina=="")
			$pagina = "index.php";
		
		if(isset($_SESSION['id_usuario'])){
			$usuario = $_SESSION['id_usuario'];
			guardar_visita($pagina,$usuario);
		}else{
			guardar_visita($pagina,"");
			$usuario = "0";
		}
		?>
			<!DOCTYPE HTML>
			<html>
			  <head>
			    <title><?php echo $titulo; ?></title>
			    <meta name="viewport" content="width=device-width">
			    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
			    <link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/css/tema_menu.css">
			    <link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/css/tema_principal.css">
			    <link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/css/tema_paginas.css">
			    <link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/producto/tema_producto.css">
			    <link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/menu/estilo_menu_responsive.css">

			    <link href='http://fonts.googleapis.com/css?family=Rouge+Script' rel='stylesheet' type='text/css'>
			    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
			    
			    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			    <script src="http://pasteleriaja.com/menu/menu_responsive.js"></script>
			    <script type="text/javascript" src="http://pasteleriaja.com/producto/funcionalidad_producto.js"></script>
			    
			    <script type="text/javascript" src="http://pasteleriaja.com/slide/funcionamiento_slide_basico.js"></script>
			    
				<link rel="stylesheet" type="text/css" href="http://pasteleriaja.com/slide/estilo_slide.css">
				<script type="text/javascript">
					$(document).ready(function(){
						//le quita el border a la ultima opcion del menu
						$("#botonera_principal .opcion_principal_menu").last().css("border-right","0px solid silver");
						$(".contenedor_opcion_secundaria_menu").each(function(){
							$(this).children(".opcion_secundaria_menu").last().css("border-bottom","0px solid silver");	
						})

						$("#llamar_identificarse").click(function(){
							$("#contenedor_login").css("display","block");
						});
						$("#cerrar_login").click(function(){
							$("#contenedor_login").css("display","none");
						});
						$("#boton_identificarse").click(function(){
							$.ajax({
								type: 'post',
								url: <?php echo "'http://$_SERVER[HTTP_HOST]/usuario/intento_loguearse.php'"; ?>,
								dataType: 'json',
								data: {
									correo: $("#correo_login").val(), pass: $("#password_login").val()
								},
								success: function(res){
									if(res.codigo=="1"){
										$("#contenedor_login").css("display","none");
										$("#llamar_identificarse").removeAttr("id");
										$("#texto_right span").html(res.nombre);
										alert(res.mensaje);
										location.reload();
									}else{
										alert(res.mensaje);
									}
								}
							});
						});
					});
				</script>
			  </head>
			  <body>
			  <div id="contenedor_principal">
			  		<div id="contenedor_login">
			  			<div id="cerrar_login">X</div>
			  			<h2 >Login</h2>
			  			<label>Correo: </label><input type="mail" id="correo_login" ><br>
			  			<label>Password: </label><input type="password" id="password_login"><br>
			  			<div id="boton_identificarse">Identificarse</div>
			  		</div>

			  		<!--<div id="encabezado_principal">
				    	<div id="contenedor_baner">
				    		<div id="sintia_superior">
				    			<div id="contenedor_boton_menu"></div><div id="texto_left">Envia lo rapido</div><div id="texto_right">
				    				<?php if(isset($_SESSION['id_usuario'])){ 
				    					echo $_SESSION['nombre_usuario'];
				    				
				    					}else{ 
				    						?>
				    						<span id="llamar_identificarse">Login/Registrar</span>
				    						<?php
				    					} ?></div>
				    		</div>
				    		<div id="contenedor_logo">
				    			Speedy
				    		</div>
				    		
				    		
				    		<div id="adorno_baner"></div>
				    	</div>
				    	-->
			    	<div id="encabezado_principal">
				    	<div id="contenedor_baner">
				    		<div id="llamar_login"><div id="menu_reducido"><img src="http://pasteleriaja.com/apariencia/boton_menu_blanco.png"></div><?php if(isset($_SESSION['id_usuario'])){ 
				    					echo $_SESSION['nombre_usuario'];
				    				
				    					}else{ 
				    						?>
				    						<span id="llamar_identificarse">Login/Registrar</span>
				    						<?php
				    					} ?></div>
				    		<div id="contenedor_logo">
				    			<img src="http://pasteleriaja.com/apariencia/logo.png">
				    		</div>
				    		
				    	</div>
		    
				    	<div id="botonera_principal">
				    		<?php traer_menu($usuario); ?>
				    	</div>
				    </div>

				    <div id="cuerpo_principal">
				    	<div id="contenido_principal">
	<?php
			if(verificar_acceso($usuario,$acceso)==0){
				echo "<br>No tiene acceso a esta opcion";
				pie();
				exit;
			}
	}
	function pie(){
		if(isset($_SESSION['id_usuario'])){
			$usuario = $_SESSION['id_usuario'];
			
		}else{
			
			$usuario = "0";
		}
	?>
			</div>
		    	<div id="lateral_principal">
		    		
		    	</div>
		    </div>
		    <div id="pie_principal">
		    	<label id="info_left">El complemento perfecto para la fiesta.</label><label id="info_center"></label><label id="info_right">Desarrollo por: <a href="http://solucionclic.com">solucionclic.com</a></label>
		    </div>
	  </div>
	    
	  </body>
	</html>
	
	<?php

	}
?>
