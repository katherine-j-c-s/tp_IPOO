<?php
/*
    También se desea guardar la información de la persona responsable de realizar el viaje, 
    para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
 */
class ResponsableV {
    private $nombre;
    private $apellido;
    private $numEmpleado;
    private $numLicencia;
    /*
        Método constructor _ _construct() que recibe como parámetros los valores 
        iniciales para los atributos de la clase.
    */
    public function __construct($nombre,$apellido,$numEmpleado,$numLicencia){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numEmpleado=$numEmpleado;
        $this->numLicencia=$numLicencia;
    }
    /*
        Los métodos de acceso de cada uno de los atributos de la clase.
    */
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    /*
        Los métodos de modificacion de cada uno de los atributos de la clase.
    */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setNumEmpleado($documento){
        $this->numEmpleado = $documento;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    /*
        Redefinir el método _ _toString() para que retorne la información 
        de los atributos de la clase.
    */
    public function __toString(){

        $info = "\nNombre: " . $this -> getNombre() 
        . "\nApellido: " . $this -> getApellido() 
        . "\nNumero de documento: " . $this -> getNumEmpleado()
        . "\nNumero de telefono: " . $this -> getNumLicencia();

        return $info;
    }
}