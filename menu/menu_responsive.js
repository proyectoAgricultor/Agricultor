$(document).ready(function(){
	var estatus_menu = 0;
	$("#menu_reducido").click(function(){
		if(estatus_menu==0){
			$("#botonera_principal").css("margin-left","0");
			estatus_menu=1;
		}else{
			$("#botonera_principal").css("margin-left","-100%");
			estatus_menu=0;
		}
	});
});