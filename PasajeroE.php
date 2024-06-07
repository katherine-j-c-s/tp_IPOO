<?php

class PasajeroE extends Pasajero{
    public function __construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket){
        parent::__construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket);
    }
    public function darPorcentajeIncremento(){
        // Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
        $porcentaje = 10;
        return $porcentaje;
    }
    public function __toString(){
        $cadena = parent::__toString();
        return $cadena;
    }
}