<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plaga
 *
 * @author elioth010
 */
class Plaga {
    //put your code here
    private $id;
    private $nombrePopular;
    private $nombreCientifico;
    private $descripcion;
    private $fuente;
    private $usuario;
    private $ingreso;
    private $status;
    private $tipoPlaga;
    
    function  __construct(){
        
    }
            
    public static function newInstanceWithFields($id, $nombrePopular, $nombreCientifico, $descripcion, $fuente, $usuario, $ingreso, $status, $tipoPlaga) {
        $plaga = new Plaga();
        $plaga->id = $id;
        $plaga->nombrePopular = $nombrePopular;
        $plaga->nombreCientifico = $nombreCientifico;
        $plaga->descripcion = $descripcion;
        $plaga->fuente = $fuente;
        $plaga->usuario = $usuario;
        $plaga->ingreso = $ingreso;
        $plaga->status = $status;
        $plaga->tipoPlaga = $tipoPlaga;
        
        return $plaga;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombrePopular() {
        return $this->nombrePopular;
    }

    public function getNombreCientifico() {
        return $this->nombreCientifico;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFuente() {
        return $this->fuente;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getIngreso() {
        return $this->ingreso;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTipoPlaga() {
        return $this->tipoPlaga;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombrePopular($nombrePopular) {
        $this->nombrePopular = $nombrePopular;
    }

    public function setNombreCientifico($nombreCientifico) {
        $this->nombreCientifico = $nombreCientifico;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFuente($fuente) {
        $this->fuente = $fuente;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setIngreso($ingreso) {
        $this->ingreso = $ingreso;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTipoPlaga($tipoPlaga) {
        $this->tipoPlaga = $tipoPlaga;
    }
}
