<?php
include_once 'ResponsableViaje.php';

//Main

$unResponsable=new ResponsableViaje("Juan","Perez",1234,1);
echo $unResponsable;
$unResponsable->setNombre("Pedro");
$unResponsable->setApellido("Juarez");
$unResponsable->setNumeroLicencia(4321);
$unResponsable->setNumeroEmpleado(1000);
echo $unResponsable;