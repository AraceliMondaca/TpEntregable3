<?php
include_once 'viaje.php';
class Aereo extends Viaje{
private $numVuelo;
private $categoria;
private $nomAerolinea;
private $escala;
public function __construct($codigo,$destino,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp,$colObjPasajero,$importe,$tipoSalida,$numVuelo,$categoria,$nomAerolinea,$escala){
    parent::__construct($codigo,$destino,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp,$colObjPasajero,$importe,$tipoSalida);
    $this->numVuelo=$numVuelo;
    $this->categoria=$categoria;
    $this->nomAerolinea=$nomAerolinea;
    $this->escala=$escala;
}
    public function getNumVuelo(){
        return $this->numVuelo;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function getNomAerolinea(){
        return $this->nomAerolinea;
    }
    public function getEscala(){
        return $this->escala;
    }
    public function setNumVuelo($numVuelo){
        $this->numVuelo=$numVuelo;
    }
    public function setCategoria($categoria){
        $this->categoria=$categoria;
    }
    public function setNomAerolinea($nomAerolinea){
        $this->nomAerolinea=$nomAerolinea;
    }
    public function setEscala($escala){
        return $this->escala=$escala;
    }

    /** */
    public function venderPasaje($pasajero){
        $pasajeDisp=parent::hayPasajesDisponible();
        $precio=$this->getImporte();
      if ($pasajeDisp==true){
          if ($this->getCategoria()=='primera' && $this->getEscala()==0) {
            $precio=$precio+($precio*0.4);
          }elseif ($this->getCategoria()=='primera' && $this->getEscala>0) {
            $precio=$precio+($precio*0.6);
        }
      }
      if ($this->getTipoSalida()=='ida y vuelta'){
        $precio=$precio+($precio*0.5);
      }
      $venta= "el viaje del pasajero/a:".$pasajero."es de ".$precio."total";
      return $venta;
    }

    public function __toString(){
        $vuelo=parent::__toString();
        $vuelo .="numero de vuelo: ".$this->getNumVuelo().
        "\n categoria :".$this->getCategoria().
        "\n nombre de aerolinea: ".$this->getNomAerolinea().
        "\n escalas: ".$this->getEscala();
        return $vuelo;
    }
}
    


?>