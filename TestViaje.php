<?php
include_once 'Viaje.php';

/**
 * Muestra un menu de opciones para que el usuario elija una accion a realizar
 * @return string $opcion
 */
function menu(){
    echo "Ingrese una opcion\n";
    echo "0. Salir\n";
    echo "1. Mostrar informacion del viaje\n";
    echo "2. Mostrar informacion del responsable del viaje\n";
    echo "3. Mostrar informacion de todos los pasajeros\n";
    echo "4. Mostrar informacion de un pasajero segun su numero de documento\n";
    echo "5. Modificar informacion del viaje\n";
    echo "6. Modificar informacion del responsable de viaje\n";
    echo "7. Modificar informacion de un pasajero\n";
    echo "8. Agregar un pasajero\n";
    echo "9. Eliminar un pasajero\n";
    echo "Opcion: ";
    do{
        $opcion=trim(fgets(STDIN));
        if($opcion<1 && $opcion>9){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<1 && $opcion>9);
    return $opcion;
}

/**
 * Muestra un menu de opciones para modificar informacion del viaje
 * @return string
 */
function menuModificarViaje(){
    echo "Que datos desea modificar?\n";
    echo "0. Salir\n";
    echo "1. Codigo\n";
    echo "2. Destino\n";
    echo "3. Cantidad maxima de pasajeros\n";
    do{
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
        if($opcion<0 || $opcion>3){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<0 || $opcion>2);
    return $opcion;
}

/**
 * Muestra un menu de opciones para modificar informacion del responsable de viaje
 * @return string
 */
function menuModificarResponsable(){
    echo "Que datos desea modificar?\n";
    echo "0. Salir\n";
    echo "1. Nombre\n";
    echo "2. Apellido\n";
    echo "3. Numero de licencia\n";
    echo "4. Numero de empleado\n";
    do{
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
        if($opcion<0 || $opcion>4){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<0 || $opcion>4);
    return $opcion;
}

/**
 * Muestra un menu de opciones para modificar informacion de un pasajero
 * @return string
 */
function menuModificarPasajero(){
    echo "Que datos desea modificar?\n";
    echo "0. Salir\n";
    echo "1. Nombre\n";
    echo "2. Apellido\n";
    echo "3. Numero de documento\n";
    echo "4. Telefono\n";
    do{
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
        if($opcion<0 || $opcion>4){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<0 || $opcion>4);
    return $opcion;
}

/**
 * @return string
 */
function menuDeseaContinuar(){
    echo "Desea modificar otros datos?\n";
    echo "1. Si\n";
    echo "2. No\n";
    do{
        echo "Opcion: ";
        $opcion=trim(fgets(STDIN));
        if($opcion<1 || $opcion>2){
            echo "Opcion invalida. Intente nuevamente\n";
        }
    }while($opcion<1 || $opcion>2);
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
 * Crea una instancia de la clase Pasajero y la retorna
 * @return Pasajero
 */
function creaPasajero(){
    echo "CARGUE LOS DATOS DEL PASAJERO\n";
    echo "Ingrese el nombre: ";
    $nombre=trim(fgets(STDIN));
    echo "Ingrese el apellido: ";
    $apellido=trim(fgets(STDIN));
    echo "Ingrese el numero de documento: ";
    $numeroDocumento=trim(fgets(STDIN));
    echo "Ingrese el telefono: ";
    $telefono=trim(fgets(STDIN));
    $unPasajero=new Pasajero($nombre,$apellido,$numeroDocumento,$telefono);
    return $unPasajero;
}

/**
 * Crea una instancia de la clase Viaje y la retorna
 * @return Viaje
 */
function creaViaje(){
    echo "CARGUE LOS DATOS DEL RESPONSABLE DE VIAJE\n";
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
$unViaje=creaViaje();
echo "\n";
do{
    $opcion=menu();
    echo "\n";
    switch($opcion){
        case 1:
            echo "INFORMACION DEL VIAJE\n\n";
            echo $unViaje;
            echo "\n";
            break;
        case 2:
            echo "INFORMACION DEL RESPONSABLE DE VIAJE\n\n";
            echo $unViaje->getResponsableViaje();
            echo "\n";
            break;
        case 3:
            if($unViaje->cantidadPasajeros()!=0){  //Verifica que el arreglo de pasajeros no este vacio 
                echo "INFORMACION DE TODOS LOS PASAJEROS\n\n";
                for($i=0;$i<$unViaje->cantidadPasajeros();$i++){
                    echo $unViaje->darPasajeroEn($i);  //Muestra la informacion de los pasajeros si no esta vacio
                    echo "\n";
                }
            }else{
                echo "No hay pasajeros cargados\n\n"; //Mensaje por si el arreglo esta vacio
            }
            break;
        case 4: 
            if($unViaje->cantidadPasajeros()!=0){  //Verifica que el arreglo de pasajeros no este vacio
                echo "Ingrese el numero de documento: ";
                $documento=trim(fgets(STDIN));
                echo "\n";
                $posicion=$unViaje->darPosicionPasajeroConDni($documento);
                if($posicion!=-1){  //Verifica que el pasajero con ese numero de documento se encuentre en el arreglo
                    echo "INFORMACION DEL PASAJERO CON DOCUMENTO ".$documento."\n\n";
                    echo $unViaje->darPasajeroEn($posicion);
                    echo "\n";
                }else{
                    echo "El pasajero con el numero de documento ".$documento." no se encuentra cargado\n\n";
                }
            }else{
                echo "No hay pasajeros cargados\n\n";
            }
            break;
        case 5:
            do{
                $opcionModificar=menuModificarViaje();
                echo "\n";
                switch($opcionModificar){
                    case 1:
                        echo "Ingrese el nuevo codigo: ";
                        $codigo=trim(fgets(STDIN));
                        $unViaje->setCodigo($codigo);
                        break;
                    case 2: 
                        echo "Ingrese el nuevo destino: ";
                        $destino=trim(fgets(STDIN));
                        $unViaje->setDestino($destino);
                        break;
                    case 3:
                        echo "Ingrese la nueva cantidad maxima de passajeros: ";
                        $cantidad=trim(fgets(STDIN));
                        $unViaje->setCantidadMaximaPasajeros($cantidad);
                        break;
                }
                echo "Informacion actualizada exitosamente\n";
                $continuar=menuDeseaContinuar();
                echo "\n";
            }while($continuar==1);
            break;
        case 6:
            do{
                $opcionModificar=menuModificarResponsable();
                echo "\n";
                switch($opcionModificar){
                    case 1:
                        echo "Ingrese el nuevo nombre: ";
                        $nombre=trim(fgets(STDIN));
                        $unViaje->getResponsableViaje()->setNombre($nombre);
                        break;
                    case 2:
                        echo "Ingrese el nuevo apellido: ";
                        $apellido=trim(fgets(STDIN));
                        $unViaje->getResponsableViaje()->setApellido($apellido);
                        break;
                    case 3: 
                        echo "Ingrese el numero de licencia: ";
                        $numeroLicencia=trim(fgets(STDIN));
                        $unViaje->getResponsableViaje()->setNumeroLicencia($numeroLicencia);
                        break;
                    case 4:
                        echo "Ingrese el nuevo numero de empleado: ";
                        $numeroEmpleado=trim(fgets(STDIN));
                        $unViaje->getResponsableViaje()->setNumeroEmpleado($numeroEmpleado);
                        break;
                }
                echo "Informacion actualizada exitosamente\n";
                $continuar=menuDeseaContinuar();
                echo "\n";
            }while($continuar==1);
            break;
        case 7:
            if($unViaje->cantidadPasajeros()!=0){  //Verifica que el arreglo de pasajeros no este vacio
                echo "Ingrese un numero de documento: ";
                $documento=trim(fgets(STDIN));
                echo "\n";
                $posicionPasajero=$unViaje->darPosicionPasajeroConDni($documento);
                if($posicionPasajero!=-1){  //Verifica que el pasajero con ese numero de documento se encuentre en el arreglo
                    do{
                        $opcionModificar=menuModificarPasajero();
                        echo "\n";
                        switch($opcionModificar){
                            case 1:
                                echo "Ingrese el nuevo nombre: ";
                                $nombre=trim(fgets(STDIN));
                                $unViaje->darPasajeroEn($posicionPasajero)->setNombre($nombre);
                                break;
                            case 2:
                                echo "Ingrese el nuevo apellido: ";
                                $apellido=trim(fgets(STDIN));
                                $unViaje->darPasajeroEn($posicionPasajero)->setApellido($apellido);
                                break;
                            case 3: 
                                echo "Ingrese el nuevo numero de documento: ";
                                $numeroDocumento=trim(fgets(STDIN));
                                $unViaje->darPasajeroEn($posicionPasajero)->setNumeroDocumento($numeroDocumento);
                                break;
                            case 4:
                                echo "Ingrese el nuevo telefono: ";
                                $telefono=trim(fgets(STDIN));
                                $unViaje->darPasajeroEn($posicionPasajero)->setTelefono($telefono);
                                break;
                        }
                        echo "Informacion actualizada exitosamente\n";
                        $continuar=menuDeseaContinuar();
                        echo "\n";
                    }while($continuar==1);
                }else{
                    echo "El pasajero con el numero de documento ".$documento." no se encuentra cargado\n\n";
                }
            }else{
                echo "No hay pasajeros cargados\n\n";
            }
            break;
        case 8:
            if($unViaje->cantidadPasajeros()!=$unViaje->getCantidadMaximaPasajeros()){
                $unPasajero=creaPasajero();
                if($unViaje->agregarPasajero($unPasajero)){
                    echo "Pasajero cargado exitosamente\n\n";
                }else{
                    echo "Carga interrumpida, el pasajero ya se encuentra cargado\n\n";
                } 
            }else{
                echo "No se puede cargar mas pasajeros. El transporte se encuentra lleno\n\n";
            }
            break;
        case 9:
            if($unViaje->cantidadPasajeros()!=0){  //Verifica que el arreglo de pasajeros no este vacio
                echo "Ingrese un numero de documento: ";
                $documento=trim(fgets(STDIN));
                echo "\n";
                $posicionPasajero=$unViaje->darPosicionPasajeroConDni($documento);
                if($posicionPasajero!=-1){  //Verifica que el pasajero con ese numero de documento se encuentre en el arreglo
                    $unViaje->elimiarPasajero($documento);
                    echo "Pasajero eliminado correctamente\n\n";
                }else{
                    echo "El pasajero con el numero de documento ".$documento." no se encuentra cargado\n\n";
                }
            }else{
                echo "No se puede eliminar. No hay pasajeros cargados\n\n";
            }
        }
    }while($opcion!=0);