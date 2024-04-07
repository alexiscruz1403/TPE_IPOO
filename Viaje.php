<?php
include_once 'Pasajero.php';
include_once 'ResponsableViaje.php';

class Viaje{

    //Atributos
    private $codigo; //Int
    private $cantidadMaximaPasajeros; //Int
    private $destino; //String
    private $objResponsableViaje; //Obejo Clase ResponsableViaje
    private $objPasajero; //Arreglo de Objeto Clase Pasajero

    //Constructor
    public function __construct($unCodigo,$unaCantidadMaxima,$unDestino,$unResponsable){
        $this->codigo=$unCodigo;
        $this->cantidadMaximaPasajeros=$unaCantidadMaxima;
        $this->destino=$unDestino;
        $this->objResponsableViaje=$unResponsable;
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

    /**
     * Retorna el valor del atributo objResponsableViaje de la instancia
     * @return ResponsableViaje
     */
    public function getResponsableViaje(){
        return $this->objResponsableViaje;
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
     * @param array $unArreglo
     */
    public function setPasajeros($unArreglo){
        $this->objPasajero=$unArreglo;
    }

    /**
     * Modifica el valor del atributo objResponsable de la instancia por el valor pasado por parametro
     * @param ResponsableViaje $unResponsable
     */
    public function setResponsableViaje($unResponsable){
        $this->objResponsableViaje=$unResponsable;
    }


    //Propios

    /**
     * Retorna la cantidad de pasajeros en el arreglo de Pasajero en el atributo objPasajero
     * @return int
     */
    public function cantidadPasajeros(){
        return count($this->getPasajeros());
    }

    /**
     * Retorna el pasajero en la posicion indicada por parametro dentro del arreglo de Pasajero en el atributo objPasajero
     * @param int $posicion
     * @return Pasajero
     */
    public function darPasajeroEn($posicion){
        return $this->getPasajeros()[$posicion];
    }

    /**
     * Verifica si el pasajero ingresado por parametro se encuentra en el arreglo de Pasajero en el atributo objPasajero
     * Compara los numeros de documento para determinar si son iguales o no
     * Devuelve la posicion dentro del arreglo si se encuentra dentro o -1 si no esta cargado en el arreglo
     * @param int $numeroDocumento
     * @return int
     */
    public function darPosicionPasajero($numeroDocumento){
        $encontrado=false;
        $posicion=-1;
        if($this->cantidadPasajeros()!=0){
            $i=0;
            while($i<$this->cantidadPasajeros() && !$encontrado){
                if($numeroDocumento==$this->darPasajeroEn($i)->getNumeroDocumento()){
                    $encontrado=true;
                    $posicion=$i;
                }
                $i++;
            }
        }
        return $posicion;
    }

    /**
     * Añade un pasajero al arreglo de Pasajero en el atributo objPasajero
     * Antes de añadirlo verifica si se encuentra o no cargado en el arreglo
     * Devuelve true si finalmente pudo ser cargado o false si no se pudo agregar
     * @param Pasajero $unPersonaje
     * @return boolean
     */
    public function agregarPasajero($unPasajero){
        $agregado=false;
        if($this->darPosicionPasajero($unPasajero->getNumeroDocumento)==-1){
            $this->getPasajeros()[$this->cantidadPasajeros()]=$unPasajero;
            $agregado=true;
        }
        return $agregado;
    }

    /**
     * Elimina el pasajero en la posicion indicada por parametro
     * Antes de eliminarlo verifica si se encuentra o no cargado en el arreglo
     * Devuelve true si finalmente pudo ser cargado o false si no se pudo agregar
     * @param int $numeroDocumento
     * @return boolean
     */
    public function elimiarPasajero($numeroDocumento){
        $eliminado=false;
        $posicion=$this->darPosicionPasajero($numeroDocumento);
        if($posicion!=-1){
            for($i=$posicion;$i<$this->cantidadPasajeros()-1;$i++){
                $this->getPasajeros()[$i]=$this->getPasajeros()[$i+1];
            }
            array_pop($this->getPasajeros());
            $eliminado=true;
        }
        return $eliminado;
    }

}