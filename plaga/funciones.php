<?php

require_once("$_SERVER[DOCUMENT_ROOT]/Agricultor/granlibreria.php");
require_once './plaga.php';

function selectorPlaga($enable) {
    $cdb = new base();
    $seleccion = array("ID", "TITULO");
    $limitantes = array();
    $tabla = array("TIPO_PLAGA");
    $respuesta = $cdb->seleccionar($seleccion, $limitantes, $tabla);
    $string_respuesta = "";
    if ($respuesta['codigo'] == "1") {
        $string_respuesta .= "<select id=\"select_plaga\" name=\"select_plaga\"".$enable.">";
        $mensajes = $respuesta['mensaje'];
        for ($i = 0; $i < count($mensajes); $i++) {
            $string_respuesta .= "<option value=" . $mensajes[$i]['ID'] . ">" . $mensajes[$i]['TITULO'] . "</option> ";
        }
        $string_respuesta .= "</select>";
    } else {
        $string_respuesta .= $respuesta['mensaje'];
    }

    echo $string_respuesta;
}

function getPlagas() {
    $cdb = new base();
    $seleccion = array("*");
    $limitantes = array();
    $tabla = array("PLAGA");
    $respuesta = $cdb->seleccionar($seleccion, $limitantes, $tabla);
    $string_respuesta = "";
    if ($respuesta['codigo'] == "1") {
        $mensajes = $respuesta['mensaje'];
        $plagas = array();
        for ($i = 0; $i < count($mensajes); $i++) {
            $plagas[$i] = Plaga::newInstanceWithFields($mensajes[$i]['ID'], $mensajes[$i]['NOMB_POPULAR'], $mensajes[$i]['NOMB_CIENTIFICO'], $mensajes[$i]['DESCRIPCION'], $mensajes[$i]['FUENTE'], $mensajes[$i]['USUARIO'], $mensajes[$i]['INGRESO'], $mensajes[$i]['STATUS'], $mensajes[$i]['TIPO_PLAGA_ID']);
        }

        $string_respuesta .= "<table id=\"datatable-plaga\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>Nombre Popular</th>
                <th>Nombre Cientifico</th>
                <th>Descripcion</th>
                <th>Usuario</th>
                <th>Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>";

        foreach ($plagas as $plaga) {
            $string_respuesta .="<tr>";
            $string_respuesta .= "<td>" . $plaga->getNombrePopular() . "</td>" . "<td>" . $plaga->getNombreCientifico() . "</td>";
            $string_respuesta .= "<td>" . $plaga->getDescripcion() . "</td>";
            $string_respuesta .= "<td>" . $plaga->getUsuario() . "</td>" . "<td>" . $plaga->getIngreso() . "</td>";
            $string_respuesta .="<td> 
                <div id=\"table_action_buttons\">
                    <form id=\"form_datatable_plaga_ver\" method=\"post\" action=\"ver.php\" style=\"display: inline-block;\">
                        <a href=\"#\" onclick=\"$('#form_datatable_plaga_ver').submit();\"><img src=\"../apariencia/view.png\" title=\"Visualiza el registro\" alt=\"Visualiza el registro\" height=\"20\" width=\"20\"/></a>
                        <input type=\"hidden\" name=\"plaga_id\" value=\"".$plaga->getId()."\"/>
                    </form>
                    <form id=\"form_datatable_plaga_update\" method=\"post\" action=\"actualizar.php\" style=\"display: inline-block;\">
                        <a href=\"#\" onclick=\"$('#form_datatable_plaga_update').submit();\"><img src=\"../apariencia/edit.png\" title=\"Visualiza el registro\" alt=\"Visualiza el registro\" height=\"20\" width=\"20\"/></a>
                        <input type=\"hidden\" name=\"plaga_id\" value=\"".$plaga->getId()."\"/>
                    </form>
                    <form id=\"form_datatable_plaga_delete\" method=\"post\" action=\"eliminar.php\" style=\"display: inline-block;\">
                        <a href=\"#\" onclick=\"$('#form_datatable_plaga_delete').submit();\"><img src=\"../apariencia/less.png\" title=\"Visualiza el registro\" alt=\"Visualiza el registro\" height=\"22\" width=\"22\"/></a>
                        <input type=\"hidden\" name=\"plaga_id\" value=\"".$plaga->getId()."\"/>
                    </form>
                </div>
            </td>";
            $string_respuesta .="</tr>";
        }
        $string_respuesta .="</tbody>
        </table>";
    } else {
        $string_respuesta .= "<table id=\"datatable-plaga\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>Nombre Popular</th>
                <th>Nombre Cientifico</th>
                <th>Descripcion</th>
                <th>Usuario</th>
                <th>Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        </table>";
        $string_respuesta .= "<h5>No hay registros disponibles</h5>";
    }
    echo $string_respuesta;
}

function findPlagaByID($id){
    $cdb = new base();
    $seleccion = array("*");
    $limitantes = array('ID' => $id);
    $tabla = array("PLAGA");
    $respuesta = $cdb->seleccionar($seleccion, $limitantes, $tabla);
    if ($respuesta['codigo'] == "1") {
        $mensajes = $respuesta['mensaje'];
        $plaga = new Plaga();
        for ($i = 0; $i < count($mensajes); $i++) {
            $plaga = Plaga::newInstanceWithFields($mensajes[$i]['ID'], $mensajes[$i]['NOMB_POPULAR'], $mensajes[$i]['NOMB_CIENTIFICO'], $mensajes[$i]['DESCRIPCION'], $mensajes[$i]['FUENTE'], $mensajes[$i]['USUARIO'], $mensajes[$i]['INGRESO'], $mensajes[$i]['STATUS'], $mensajes[$i]['TIPO_PLAGA_ID']);
            return $plaga;
        }
        return $plaga;
    } else {
        return new Plaga();
    }
}

function selectorTipoPlagaByID($enable, $id) {
    $cdb = new base();
    $seleccion = array("ID", "TITULO");
    $limitantes = array("ID"=>$id);
    $tabla = array("TIPO_PLAGA");
    $respuesta = $cdb->seleccionar($seleccion, $limitantes, $tabla);
    $string_respuesta = "";
    if ($respuesta['codigo'] == "1") {
        $string_respuesta .= "<select id=\"select_plaga\" name=\"select_plaga\"".$enable.">";
        $mensajes = $respuesta['mensaje'];
        for ($i = 0; $i < count($mensajes); $i++) {
            $string_respuesta .= "<option value=" . $mensajes[$i]['ID'] . ">" . $mensajes[$i]['TITULO'] . "</option> ";
        }
        $string_respuesta .= "</select>";
    } else {
        $string_respuesta .= $respuesta['mensaje'];
    }

    echo $string_respuesta;
}

function savePlaga(Plaga $plaga){
    $cdb 		= new base();
    //$estatus 	= "1";
    $variables 	= array($plaga->getId(),$plaga->getNombrePopular(),$plaga->getNombreCientifico(),$plaga->getDescripcion(),$plaga->getFuente(),$plaga->getUsuario(),$plaga->getIngreso(),$plaga->getStatus(),$plaga->getTipoPlaga());
    $tabla		= "PLAGA";
    $increment	= 0;
    $respuesta	= $cdb->insertar($variables, $tabla, $increment);
    echo json_encode($respuesta);
}

function deletePlaga(Plaga $plaga){
    $cdb            = new base();
    $limitantes     = array("ID"=>$plaga->getId());
    $tabla          = "PLAGA";
    $logico         = 0;
    $respuesta = $cdb->eliminar_complejo($limitantes,$tabla,$logico);
    echo json_encode($respuesta);
}

function updatePlaga(Plaga $plaga){
    $cdb            = new base();
    $variables      = array("NOMB_POPULAR"=>$plaga->getNombrePopular(),
                        "NOMB_CIENTIFICO"=>$plaga->getNombreCientifico(),
                        "DESCRIPCION"=>$plaga->getDescripcion(),
                        "FUENTE"=>$plaga->getFuente(),
                        "USUARIO"=>$plaga->getUsuario(),
                        "INGRESO"=>$plaga->getIngreso(),
                        "STATUS"=>$plaga->getStatus(),
                        "TIPO_PLAGA_ID"=>$plaga->getTipoPlaga());
    $limitantes     = array("ID"=>$plaga->getId());
    $tabla          = "PLAGA";
    $respuesta      = $cdb->actualizar($variables,$limitantes,$tabla);
    echo json_encode($respuesta);
}

?>