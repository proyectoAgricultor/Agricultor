<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//variables de entorno
//

require_once("$_SERVER[DOCUMENT_ROOT]/Agricultor/granlibreria.php");
require_once './plaga_prototype.php';
require_once './funciones.php';
encabezado("administracion de garantias", "clasificacion_admin");
?>	  
<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script class="include" type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script class="include" type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.css" type="text/css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" type="text/css"/>



<script type="text/javascript" src="funcionalidad_basica_gestor.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-plaga').dataTable({
            "pagingType": "simple_numbers"
        });
    });
</script>

<style>
    table, th, td {
        text-align: left;
    }
</style>

<link rel="stylesheet" type="text/css" href="../css/estilo_basico_gestores.css">
<h2>Administraci&oacute;n de Plagas</h2>

<div id="container">
    <div class="table" id="table">
        <div style="float: right;">
            <div id="header_button_action_plaga" style="border: 2px solid #a1a1a1;">
                <form id="form_header_plaga_add" method="post" action="enviar.php" style="margin: 0 auto;">
                    <table>
                        <tr>
                            <td>
                                <h5>Agregar</h5>
                            </td>
                            <td>
                                <a href="#" onclick="$('#form_header_plaga_add').submit();" style="text-decoration: none; color: black; display: inline-flex;">
                                    <img src="../apariencia/add.png" title="Crea un nuevo registro" alt="Crea un nuevo registro" height="35" width="35"/>
                                </a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <br/>
        <br/>
        <div id="table_container" class="table_container">
            <?php getPlagas() ?>
        </div>

    </div>
    <!--    <div class="opciones_botonera" id="boton_actualizar">Actualizar</div>
        <div class="opciones_botonera" id="boton_eliminar">Eliminar</div>-->
</div>

<!--<div id="create_prototype" style="display: none;">><
    <div id="container_create_prototype">
        <form>
<?php //getPrototype("create", new Plaga()) ?>
        </form>
    </div>
</div>-->


<!--<div id="contenedor_buscador">
    <label>Titulo: </label><input type="text" id="titulo_buscar"><input type="button" id="realizar_busqueda" value="Buscar"><br>
    <div id="resultado_busqueda">

    </div>
</div>
<div id="contenedor_datos">
    <input type="hidden" value="" id="id" />
    <label>Titulo: </label><input type="text" id="titulo" class="descripcion reiniciable" /><br>
    <div id="boton_ejecutar">Guardar</div>
</div>-->
<?php
pie();
?>	