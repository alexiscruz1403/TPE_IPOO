<?php

class ResponsableViaje{

    //Atributos
    private $nombre; //String
    private $apellido; //String
    private $numeroLicencia; //Int
    private $numeroEmpleado; //Int
    
    //Constructor
    public function __construct($unNombre, $unApellido, $unNumeroLicencia, $unNumeroEmpleado){
        $this->nombre=$unNombre;
        $this->apellido=$unApellido;
        $this->numeroEmpleado=$unNumeroEmpleado;
        $this->numeroLicencia=$unNumeroLicencia;
    }

    //Observadores

    /**
     * Retorna el valor del atributo nombre de la instancia 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Retorna el valor del atributo apellido de la instancia 
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Retorna el valor del atributo numeroLicencia de la instancia 
     * @return string
     */
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    /**
     * Retorna el valor del atributo numeroEmpleado de la instancia 
     * @return string
     */
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    /**
     * Retorna una cadena con toda la informacion de la instancia
     * @return string
     */
    public function __toString(){
        return "Nombre: ".$this->getNombre()."\n".
                "Apellido: ".$this->getApellido()."\n".
                "Numero Licencia: ".$this->getNumeroLicencia()."\n".
                "Numero Empleado: ".$this->getNumeroEmpleado()."\n";
    }

    //Modificadores

    /**
     * Modifica el valor del atributo nombre de la instancia por el valor pasado por parametro
     * @param string $unNombre
     */
    public function setNombre($unNombre){
        $this->nombre=$unNombre;
    }

    /**
     * Modifica el valor del atributo apellido de la instancia por el valor pasado por parametro
     * @param string $unApellido
     */
    public function setApellido($unApellido){
        $this->apellido=$unApellido;
    }

    /**
     * Modifica el valor del atributo numeroLicencia de la instancia por el valor pasado por parametro
     * @param string $unNumeroLicencia
     */
    public function setNumeroLicencia($unNumeroLicencia){
        $this->numeroLicencia=$unNumeroLicencia;
    }

    /**
     * Modifica el valor del atributo numeroEmpleado de la instancia por el valor pasado por parametro
     * @param string $unNumeroEmpleado
     */
    public function setNumeroEmpleado($unNumeroEmpleado){
        $this->numeroEmpleado=$unNumeroEmpleado;
    }

}