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
                <table>
                    <tr>
                        <td>
                            <h5>Regresar</h5>
                        </td>
                        <td>
                            <a href="http://localhost/Agricultor/plaga/" style="text-decoration: none; color: black; display: inline-flex;">
                                <img src="../apariencia/regresar.png" title="Regresa a la pagina anteorior" alt="Regresa a la pagina anterior" height="35" width="35"/>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br/>
        <br/>
        <div id="prototype_container" class="prototype_container">
            <form id="form_plaga_actualizar" method="POST" action="eliminar.php">
                <?php
                    $prototype = findPlagaByID($_POST["plaga_id"]);
                    getPrototype("create", $prototype);
                ?>
                <input type="submit" value="Actualizar" />
            </form>
        </div>
    </div>
</div>
<?php
pie();
?>	