<?php

Class Pasajero{

    //Atributos
    private $nombre; //String
    private $apellido; //String
    private $numeroDocumento; //Int

    //Constructor
    public function __construct($unNombre, $unApellido, $unNumeroDocumento){
        $this->nombre=$unNombre;
        $this->apellido=$unApellido;
        $this->numeroDocumento=$unNumeroDocumento;
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
     * Retorna el valor del atributo numeroDocumento de la instancia
     * @return int 
     */
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    //Modificadores

    /**
     * Modifica el valor del atributo nombre de la instancia
     * @param string $unNombre
     */
    public function setNombre($unNombre){
        $this->nombre=$unNombre;
    }

    /**
     * Modifica el valor del atributo nombre de la instancia
     * @param string $unApellido
     */
    public function setApellido($unApellido){
        $this->nombre=$unApellido;
    }

    /**
     * Modifica el valor del atributo nombre de la instancia
     * @param int $unNumeroDocumento
     */
    public function setNumeroDocumento($unNumeroDocumento){
        $this->nombre=$unNumeroDocumento;
    }

    //Propios
}