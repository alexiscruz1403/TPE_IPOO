<?php

class Viaje{

    //Atributos
    private $codigo; //Int
    private $cantidadMaximaPasajeros; //Int
    private $destino; //String
    private $objPasajero; //Arreglo de Pasajero

    //Constructor
    public function __construct($unCodigo,$unaCantidadMaxima,$unDestino){
        $this->codigo=$unCodigo;
        $this->cantidadMaximaPasajeros=$unaCantidadMaxima;
        $this->destino=$unDestino;
    }

    //Observadores

    /**
     * Retorna el valor del atributo codigo de la instancia
     * @return int
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * Retorna el valor del atributo cantidadMaximaPasajeros de la instancia
     * @return int
     */
    public function getCantidadMaximaPasajeros(){
        return $this->cantidadMaximaPasajeros;
    }

    /**
     * Retorna el valor del atributo destino de la instancia
     * @return string
     */
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Retorna el arreglo de Pasajero del atributo objPasajero de la instancia
     * @return array
     */
    public function getPasajeros(){
        return $this->objPasajero;
    }
}