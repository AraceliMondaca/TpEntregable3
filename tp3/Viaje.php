<?php

class Viaje{
  //atributos
    private $codigo;
    private $destino;
    private $cantidadPAsajeros;
    private $cantidadMaxPasajeros; //int $cantidadMaxPasajeros
    private $personaResp;
    private $colObjPasajero;
    private $importe; //int
    private $tipoSalida; //striring
  //constructor
  //modificacion  que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono
    public function __construct($codigo,$destino,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp,$colObjPasajero,$importe,$tipoSalida){
        $this->destino=$destino;
        $this->codigo=$codigo;
        $this->cantidadPAsajeros=$cantidadPAsajeros;
        $this->cantidadMaxPasajeros=$cantidadMaxPasajeros;
        $this->personaResp=$personaResp;
        $this ->colObjPasajero=$colObjPasajero;
        $this->importe = $importe;
        $this->tipoSalida = $tipoSalida;
    }
  //metodo
    public function getColObjPasajero() {
       return $this->colObjPasajero;
    }
    public function nombre() {
        return $this->nombre;
     }
    public function getapellido() {
        return $this->apellido;
     }
     public function getnumeroDocumento() {
        return $this->numeroDocumento;
     }
     public function getTelefono() {
        return $this->getTelefono;
     }
     public function getdestino() {
        return $this->destino;
     }
     public function getcodigo() {
        return $this->codigo;
     }
     
     public function getCantidadPAsajeros(){
        return $this->cantidadPAsajeros;
    }
    public function setCantidadPAsajeros($cantidadPAsajeros){
        $this->cantidadPAsajeros = $cantidadPAsajeros;
    }

    public function getCantidadMaxPasajeros(){
        return $this->cantidadMaxPasajeros;
    }
    public function setCantidadMaxPasajeros($cantidadMaxPasajeros){
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
    }

    public function getPersonaResp(){
        return $this->personaResp;
    }

    public function setPersonaResp($personaResp){
        $this->personaResp = $personaResp;
    }

    public function setColObjPasajero($colObjPasajero){
        $this->colObjPasajero = $colObjPasajero;
    }
    public function setnombre($nombre) {
        $this->nombre=$nombre;
    }
    public function setapellido($apellido) {
        $this->apellido=$apellido;
    }
    public function setnumeroDocumento($numeroDocumento) {
        $this->numeroDocumento=$numeroDocumento;
    }
    public function setTelefono($telefono) {
        $this->telefono=$telefono;
    }
    public function setdestino($destino) {
        $this->destino=$destino;
    }
    public function setcodigo($codigo) {
        $this->codigo=$codigo;
    }
    
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getTipoSalida(){
        return $this->tipoSalida;
    }
    public function setTipoSalida($tipoSalida){
        $this->tipoSalida = $tipoSalida;
    }

    //busca al pasajero mendiante el nombre
    /* public function buscarPasajero($nombrePasajero){
        $colPasajero=$this->getColObjPasajero();
        $existente=false;
        foreach($colPasajero as $pasajero){
            $nombre = $pasajero->getNombre();
            if($nombre == $nombrePasajero){
                $existente = true;
            }
        }
        return $existente;
    } */

    /**
     * modifica los datos del pasajero
     * @param obejct $pasajero
     * return boolean
     */
    public function modificarDatos($nombreV,$nombreN,$apellidoN,$dniN,$telefonoN){
    //boolean $cambio
    $cambio=false;
    $listPasajero=$this->getColObjPasajero();
        foreach($listPasajero as $pasajeroCol){
            $nombre = $pasajeroCol->getNombre();
            if($nombre == $nombreV){
                $pasajeroCol->setNombre($nombreN);
                $pasajeroCol->setApellido($apellidoN);
                $pasajeroCol->setDocumento($dniN);
                $pasajeroCol->setTelefono($telefonoN);
                $cambio = true;
            }
        }
        return $cambio;
    }
       /**
     * modifica los datos del pasajero
     * @param obejct $pasajero
     * return boolean
     */
    public function modificarDatosResponsable($numEmpleado,$numLicencia,$nombreN,$apellidoN){
        
        $personaR=$this->getPersonaResp();
     
                    $personaR->setNumEmpleado($numEmpleado);
                    $personaR->setNumLicencia($numLicencia);
                    $personaR->setNombre($nombreN);
                    $personaR->setApellido($apellidoN);

        }

    /*Implemente la función hayPasajesDisponible() 
    que retorna verdadero si la cantidad de pasajeros del viaje es menor 
    a la cantidad máxima de pasajeros y falso caso contrario.*/
    /**
     * verifica si quedan pasajes
     * @param obejct $pasajero
     * return boolean
     */
    public function hayPasajesDisponible(){
    //boolean $pasaje
        $pasaje = true;
        if($this->getCantidadMaxPasajeros() <= (count($this->getColObjPasajero()))){
            $pasaje = false;
        }
        return $pasaje;
    }

public function agregarPasajero($nombreN,$apellido,$dni,$telefono){
    //bolean $incremento
    $objP = new Persona($nombreN,$apellido,$dni,$telefono);
    $exite = false;   
    $pasajeros = $this->getColObjPasajero();
    foreach($pasajeros as $pasajero){
        $nombre = $pasajero->getNombre();
        //echo $nombre;
        if($nombre == $nombreN){
            
            //echo "\nMI NOMBRE ES: ".$nombre;
            $exite = true;
        }
    }
    if($exite == false){
        array_push($pasajeros, $objP);
        $this->setColObjPasajero($pasajeros);
    }
    
    return $exite;   
}

/**
 * reduce los pasaje
 * @param obejct $pasajero
 *return boolean
 */
public function reducir($pasajero){
    $reducir = false;
    $pasaje = $this->getColObjPasajero();
    if(in_array($pasajero, $pasaje)){
        $cod = array_search($pasajero, $pasaje);
        array_splice($pasaje, $cod, 1);
        $this->setColObjPasajero($pasaje);
        $reducir = true;
    }
    return $reducir;
}
 
    public function verPasajeros(){
        $colPasajeros = $this->getColObjPasajero();
        $datos = "";
        for($i=0 ; $i<count($colPasajeros) ; $i++){
            $datos .= $colPasajeros[$i];
        }
        return $datos;
    }

    /**
     * 
     */
    public function __toString(){
        $str = 
        "Codigo de Viaje: ".$this->getCodigo().
        "\nDestino: ".$this->getDestino().
        "\nCantidad maxima de pasajes: ".$this->getCantidadMaxPasajeros().
        "\nImporte: $".$this->getImporte().
        "\nIda/Ida y Vuelta: ".$this->getTipoSalida().
        "\n\nPersona responsable: ".$this->getPersonaResp().
        "\n\nPasajeros: ".$this->verPasajeros();
        return $str;
    }

    
    
}



?>