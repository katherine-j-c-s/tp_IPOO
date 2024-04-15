<?php
/*
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú 
que permita cargar la información del viaje, modificar y ver sus datos.
*/
include "Viaje.php";

echo "\nEsta es la empera de transporte VIAJE FELIZ!!";
echo "\nVamos a registrar la informacion referente a su viaje";

echo "\n\nCodigo de viaje: ";
$codigo = trim(fgets(STDIN));
echo "Destino: ";
$destino = trim(fgets(STDIN));
echo "Cantidad maxima de pasajeros: ";
$cantMaxPasajeros = trim(fgets(STDIN));

echo "\n¡Ahora te pediremos datos de la persona responsable del viaje!";
echo "\nNombre: ";
$nombre = trim(fgets(STDIN));
echo "Apellido: ";
$apellido = trim(fgets(STDIN));
echo "Numero de Empleado: ";
$numEmpleado = trim(fgets(STDIN));
echo "Numero de Licencia: ";
$numLicencia = trim(fgets(STDIN));
$responsableViaje= array(
    "nombre" => $nombre,
    "apellido" => $apellido,
    "numEmpleado" => $numEmpleado,
    "numLicencia" => $numLicencia
);

echo "\nCantidad de pasajeros: ";
$cantPasajeros = trim(fgets(STDIN));
$pasajeros = [];
$num = 1;
echo "\n¡Ahora te pediremos los datos de cada pasajero!";
for ($i=0; $i < $cantPasajeros; $i++) { 
    echo "\n\nPasajero n°".$num;
    do{
        echo "\nNombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Numero de documento: ";
        $numDocumento = trim(fgets(STDIN));
        echo "Numero de telefono: ";
        $numTelefono = trim(fgets(STDIN));
        $pasajero= array(
            "nombre" => $nombre,
            "apellido" => $apellido,
            "documento" => $numDocumento,
            "telefono" => $numTelefono
        );
        $seRepite = false;
        if(count($pasajeros) !== 0){ 
            for ($i=0; $i < count($pasajeros); $i++) { 
                if(array_search($nombre,$pasajeros[$i])){
                    $seRepite = true;
                    echo "\nEse pasajero ya se encuentra guardado, porfavor intente con otro";
                }
            }
        }
    }while($seRepite == true);
    array_push($pasajeros,$pasajero);
    $num++;
}
$viaje = new Viaje($codigo,$destino,$cantMaxPasajeros,$responsableViaje,$pasajeros);
echo $viaje;

echo "\n\n¿Desea cambiar los datos de su viaje? s/n \n";
$respuesta = trim(fgets(STDIN));
if($respuesta == "s"){
    echo "\nNuevo codigo: ";
    $nuevoCodigo= trim(fgets(STDIN));
    $viaje->setCodigo($nuevoCodigo);

    echo "Nuevo destino: ";
    $nuevoDestino= trim(fgets(STDIN));
    $viaje->setDestino($nuevoDestino);

    echo "Nueva cantidad maxima de pasajeros: ";
    $nuevoCantMaxPasajeros= trim(fgets(STDIN));
    $viaje->setCantMaxPasajeros($nuevoCantMaxPasajeros);

    echo "\nAhora le mostraremos los datos de el nuevo responsable del viaje\n";
    echo "Nombre: ";
    $nuevoNombre= trim(fgets(STDIN));
    echo "Apellido: ";
    $nuevoApellido= trim(fgets(STDIN));
    echo "Numero de Empleado: ";
    $nuevoNumEmpleado= trim(fgets(STDIN));
    echo "Numero de Licencia: ";
    $nuevoNumLicencia= trim(fgets(STDIN));

    $nuevoResponsableViaje= array(
        "nombre" => $nuevoNombre,
        "apellido" => $nuevoApellido,
        "numEmpleado" => $nuevoNumEmpleado,
        "numLicencia" => $nuevoNumLicencia
    );
    $viaje->setResponsableViaje($nuevoResponsableViaje);

    echo "\nAhora le mostraremos los datos de todos los pasajeros";
    do{
        echo $viaje->getPasajeros();
        echo "\nPorfavor indique el numero del pasajero que desea modificar: ";
        do{
            $posicion= trim(fgets(STDIN));
            if(!is_numeric($posicion) || $posicion <= 0 || $posicion > count($pasajeros)){
                $noSeEncuentraPasajero = true;
                $mensaje ="\ntiene que ser un numero entre 1 y ". count($pasajeros).": ";
                echo $mensaje;
            }else{
                $noSeEncuentraPasajero = false;
            }
            
        }while($noSeEncuentraPasajero == true);

        echo "\nAhora agrege los nuevos datos para modificar:";

        echo "\nNuevo nombre: ";
        $nuevoNombre= trim(fgets(STDIN));
        echo "Nuevo apellido: ";
        $nuevoApellido= trim(fgets(STDIN));
        echo "Nueva numero de documento: ";
        $nuevoNumDocumento= trim(fgets(STDIN));
        echo "Nueva numero de telefono: ";
        $nuevoNumTelefono= trim(fgets(STDIN));

        $viaje -> setPasajeros($posicion-1,$nuevoNombre,$nuevoApellido,$nuevoNumDocumento,$nuevoNumTelefono);
        echo "\n¿Desea Modificar otro pasajero? s/n\n";
        $respuesta= trim(fgets(STDIN));
    }while($respuesta == "s");
    echo $viaje;
}else{
    echo "gracias por participar :)";
}