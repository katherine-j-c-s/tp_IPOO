<?php
/*
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos
de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para almacenar la información 
correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
 */
include 'Pasajero.php';
include 'ResponsableV.php';
class Viaje {
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $responsableViaje;
    private $pasajeros;

    /**
     * Método constructor _ _construct() que recibe como parámetros los valores 
     * iniciales para los atributos de la clase.
    */
    /*
    @param $codigo INT
    @param $destino STRING
    @param $cantMaxPasajeros INT
    @param $responsableViaje ARRAY
    @param $pasajeros ARRAY
    */
    public function __construct($codigo,$destino,$cantMaxPasajeros,$responsableViaje,$pasajeros){
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->responsableViaje=$responsableViaje;
        /* EL PARAMETRO DE $responsableViaje VIENE DE ESTA MANERA:
            $responsableViaje= array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "numEmpleado" => $numEmpleado,
                "numLicencia" => $numLicencia
            );
        */
        $this->pasajeros=$pasajeros;
        /* EL PARAMETRO DE $pasajeros VIENE DE ESTA MANERA:
            $pasajeros = array[
                [ 
                    "nombre" => "kate",
                    "apellido" => "contreras",
                    "documento" => 82393892,
                    "telefono" => 82393892
                ],
                [ 
                    "nombre" => "otraNombre",
                    "apellido" => "otroApellido",
                    "documento" => 912891282,
                    "telefono" => 82393892
                ],[ 
                    "nombre" => "otraNombre",
                    "apellido" => "otroApellido",
                    "documento" => 8123722138,
                    "telefono" => 82393892
                ]
            ]
        */
    }
    /*
        Los métodos de acceso de cada uno de los atributos de la clase.
    */
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getResponsableViaje(){
        $nombre = $this->responsableViaje["nombre"];
        $apellido = $this->responsableViaje["apellido"];
        $numEmpleado = $this->responsableViaje["numEmpleado"];
        $numLicencia = $this->responsableViaje["numLicencia"];
        return new ResponsableV($nombre,$apellido,$numEmpleado,$numLicencia);
    }
    public function getPasajeros(){
        $pasajeros = "\n\nPasajeros:";
        $cant= 1;
        for ($i=0; $i < count($this->pasajeros); $i++) { 

            $pasajeros .= "\n\nN°". $cant;
            $cant++;

            $nombre = $this->pasajeros[$i]["nombre"];
            $apellido = $this->pasajeros[$i]["apellido"];
            $documento = $this->pasajeros[$i]["documento"];
            $telefono = $this->pasajeros[$i]["telefono"];
            $nuevoPasajero = new Pasajero($nombre,$apellido,$documento,$telefono);

            $pasajeros .= $nuevoPasajero;
        }
        return $pasajeros;
    }  
    /*
        Los métodos para modificar cada uno de los atributos de la clase.
    */
    // @param $codigo INT
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    // @param $destino STRING
    public function setDestino($destino){
        $this->destino = $destino;
    }
    // @param $cantMaxPasajeros INT
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    // @param $responsableViaje ARRAY
    public function setResponsableViaje($responsableV){
        $this->responsableViaje = $responsableV;
    }
    // @param $pasajeros ARRAY
    public function setPasajeros($posicion,$nombre,$apellido,$numDocumento,$telefono){
        $newList = [];
        for ($i=0; $i < count($this->pasajeros); $i++) { 
            if($i == $posicion){
                $modificacion = array(
                    "nombre" => $nombre,
                    "apellido" => $apellido,
                    "documento" => $numDocumento,
                    "telefono" => $telefono
                );
                array_push($newList,$modificacion);
            }else{
                array_push($newList,$this->pasajeros[$i]);
            }
        }
        $this->pasajeros = $newList;
    }
    /**
     * Redefinir el método _ _toString() para que retorne la información 
     * de los atributos de la clase.
    */
    public function __toString(){
        $info = "\n\nÉsta es la informacion del viaje:\n"
        . "Codigo de viaje: " . $this -> getCodigo() 
        . "\nDestino: " . $this -> getDestino()
        . "\nCantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros()
        . "\n\nResponsable del Viaje:\n" . $this -> getResponsableViaje()
        .  $this -> getPasajeros();

        return $info;
    }
}