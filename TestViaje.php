<?php
include_once 'Viaje.php';

/**
 * Muestra un menu de opciones para que el usuario elija una accion a realizar
 * @return string $opcion
 */
function menu(){
    do{
        echo "Ingrese una opcion\n";
        echo "0. Salir\n";
        echo "1. Crear un viaje";
        echo "2. Mostrar informacion del responsable del viaje\n";
        echo "3. Mostrar informacion de todos los pasajeros\n";
        echo "4. Mostrar informacion de un pasajero segun su posicion en el arreglo\n";
        echo "5. Modificar informacion del responsable de viaje\n";
        echo "6. Modificar informacion de un pasajero\n";
        echo "7. Agregar un pasajero\n";
        echo "8. Agregar un responsable de viaje\n";
        echo "9. Eliminar un pasajero\n";
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
        if($opcion<1 && $opcion>9){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<1 && $opcion>9);
    return $opcion;
}

/**
 * Crea una instancia de la clase ResponsableViaje y la retorna
 * @return ResponsableViaje
 */
function creaResponsableViaje(){
    echo "Ingrese el nombre: ";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido: ";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el numero de licencia: ";
    $numeroLicencia=trim(fgets(STDIN));
    echo "Ingrese el numero de empleado: ";
    $numeroEmpleado=trim(fgets(STDIN));
    $unResponsable=new ResponsableViaje($nombre,$apellido,$numeroLicencia,$numeroEmpleado);
    return $unResponsable;
}

/**
 * Crea una instancia de la clase Viaje y la retorna
 * @return Viaje
 */
function creaViaje(){
    echo "CARGUE LOS DATOS DEL RESPONSABLE DE VIAJE\n";
    echo "Ingrese el nombre: ";
    $unResponsable=creaResponsableViaje();
    echo "CARGUE LOS DATOS DEL VIAJE\n";
    echo "Ingrese el codigo: ";
    $codigo=trim(fgets(STDIN));
    echo "Ingrese el destino: ";
    $destino=trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros: ";
    $cantidadMaxima=trim(fgets(STDIN));
    $unViaje=new Viaje($codigo,$cantidadMaxima,$destino,$unResponsable);
    return $unViaje;
}

//Main

do{
    $opcion=menu();
    switch($opcion){
        case 1: 
            $unViaje=creaViaje();
            break;
        case 2:
            echo $unViaje->getResponsableViaje();
            break;
        case 3:
            if($unViaje->cantidadPasajeros()!=0){  //Verifica que el arreglo de pasajeros no este vacio 
                for($i=0;$i<$unViaje->cantidadPasajeros();$i++){
                    echo $unViaje->darPasajeroEn($i);  //Muestra la informacion de los pasajeros si no esta vacio
                }
            }else{
                echo "No hay pasajeros cargados"; //Mensaje por si el arreglo esta vacio
            }
            break;
        case 4:
            echo "Ingrese la posicion: ";
            $posicion=trim(fgets(STDIN));
            if($unViaje->cantidadPasajeros()!=0 && ($posicion>=0 && $posicion<$unViaje->cantidadPasajeros())){  //Verifica que el arreglo de pasajeros no este vacio y que el valor de la posicion este entre 0 y cantidad de pasajeros
                echo $unViaje->darPasajeroEn($posicion);  //Muestra la informacion de los pasajeros si se ingreso una posicion valida
            }else{
                echo "El arreglo esta vacio o ingreso una posicion invalida"; //Mensaje por si no se cumple la condicion
            }
            break;
    }
}while($opcion!=0);