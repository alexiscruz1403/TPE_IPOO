<?php
include_once 'Pasajero.php';
include_once 'ResponsableViaje.php';

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
        $this->objPasajero=array();
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

    //Modificadores

    /**
     * Modifica el valor del atributo codigo de la instancia por el valor pasado por parametro
     * @param int $unCodigo
     */
    public function setCodigo($unCodigo){
        $this->codigo=$unCodigo;
    }

    /**
     * Modifica el valor del atributo cantidadMaximaPasajeros de la instancia por el valor pasado por parametro
     * @param int $unaCantidad
     */
    public function setCantidadMaximaPasajeros($unaCantidad){
        $this->cantidadMaximaPasajeros=$unaCantidad;
    }

    /**
     * Modifica el valor del atributo destino de la instancia por el valor pasado por parametro
     * @param string $unDestino
     */
    public function setDestino($unDestino){
        $this->destino=$unDestino;
    }

    /**
     * Modifica el valor del atributo objPasajero de la instancia por el valor pasado por parametro
     * @param int $unArreglo
     */
    public function setPasajeros($unArreglo){
        $this->objPasajero=$unArreglo;
    }

    //Propios

    /**
     * Retorna la cantidad de pasajeros en el arreglo de Pasajero
     * @return int
     */
    public function cantidadPasajeros(){
        return count($this->getPasajeros());
    }

    /**
     * Retorna el pasajero en la posicion indicada por parametro dentro del arreglo de Pasajero
     * @param int $posicion
     * @return Pasajero
     */
    public function darPasajeroEn($posicion){
        return $this->getPasajeros()[$posicion];
    }

    /**
     * Verifica si el pasajero ingresado por parametro se encuentra en el arreglo de Pasajero
     * Compara los numeros de documento para determinar si son iguales o no
     * @param Pasajero $unPasajero
     * @return boolean
     */
    public function estaEnLista($unPasajero){
        $encontrado=false;
        if($this->cantidadPasajeros()!=0){
            $i=0;
            while($i<$this->cantidadPasajeros() && !$encontrado){
                if($unPasajero->getNumeroDocumento()==$this->darPasajeroEn($i)->getNumeroDocumento()){
                    $encontrado=true;
                }
                $i++;
            }
        }
        return $encontrado;
    }
}