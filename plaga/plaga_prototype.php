<?php
require_once './plaga.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function getPrototype($mode, Plaga $prototype){
        $enable = "disabled";
        if($mode === "create" || $mode === "update"){
            $enable="";
        }else{
            $enable="disabled";
        }
        echo "<table>                

                <tr>
                    <td>
                        <label for=\"id\">Id: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"id\" ".$enable." value=\"".$prototype->getId()."\" placeholder=\"1\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=\"nombre_popular\">Nombre Popular: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"nombre_popular\" ".$enable." value=\"".$prototype->getNombrePopular()."\" placeholder=\"Nombre Popular\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"nombre_cientifico\">Nombre Cientifico: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"nombre_cientifico\" ".$enable." value=\"".$prototype->getNombreCientifico()."\" placeholder=\"Nombre Cientifico\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"descripcion\">Descripcion: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"descripcion\" ".$enable." value=\"".$prototype->getDescripcion()."\" placeholder=\"Descripcion\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"fuente\">Fuente: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"fuente\" ".$enable." value=\"".$prototype->getFuente()."\" placeholder=\"Fuente\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"usuario\">Usuario: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"usuario\" ".$enable." value=\"".$prototype->getUsuario()."\" placeholder=\"Usuario\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"ingreso\">Ingreso: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"ingreso\" ".$enable." value=\"".$prototype->getIngreso()."\" placeholder=\"mm/dd/yy\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"status\">Status: </label>
                    </td>
                    <td>
                        <input type=\"text\" id=\"status\" ".$enable." value=\"".$prototype->getStatus()."\" placeholder=\"Activo/Inactivo\"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for=\"id\">Tipo Plaga: </label>
                    </td>
                    <td>
                        <?php /*aqui debo insertar el tipo plaga*/ ?>                        
                        <select \"".$enable."\">
                            <option value=\"1\">Aerea</option>
                            <option value=\"2\">Acuatica</option>
                            <option value=\"3\">Terreste</option>
                        </select>
                    </td>
                </tr>
            </table>";
    }
?>