<?php
/*
    la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos 
    nombre, apellido, numero de documento y teléfono
 */
class Pasajero {
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $numTelefono;
    /*
        Método constructor _ _construct() que recibe como parámetros los valores 
        iniciales para los atributos de la clase.
    */
    public function __construct($nombre,$apellido,$numDocumento,$numTelefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numDocumento=$numDocumento;
        $this->numTelefono=$numTelefono;
    }
    /*
        Los métodos de acceso de cada uno de los atributos de la clase.
    */
    public function getnombre(){
        return $this->nombre;
    }
    public function getapellido(){
        return $this->apellido;
    }
    public function getnumDocumento(){
        return $this->numDocumento;
    }
    public function getNumTelefono(){
        return $this->numTelefono;
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
    public function setNumDocumento($documento){
        $this->numDocumento = $documento;
    }
    public function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }
    /*
        Redefinir el método _ _toString() para que retorne la información 
        de los atributos de la clase.
    */
    public function __toString(){

        $info = "\nNombre: " . $this -> getNombre() 
        . "\nApellido: " . $this -> getApellido() 
        . "\nNumero de documento: " . $this -> getnumDocumento()
        . "\nNumero de telefono: " . $this -> getNumTelefono();

        return $info;
    }
}