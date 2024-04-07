<?php
include_once 'Pasajero.php';

$unPasajero=new Pasajero("Juan","Perez",44666999,2991234456);
echo $unPasajero;
$unPasajero->setNombre("Pedro");
$unPasajero->setApellido("Juarez");
$unPasajero->setNumeroDocumento(11222333);
$unPasajero->setTelefono(2997654321);
echo $unPasajero;