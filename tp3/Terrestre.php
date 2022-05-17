<?php 
 class Terrestre extends Viaje{
    Private $tipoCama;

    //constructor
    public function __construct($codigo,$destino,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp,$colObjPasajero,$importe,$tipoSalida,$tipoCama){
        parent::__construct($codigo,$destino,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp,$colObjPasajero,$importe,$tipoSalida);
        $this->tipoCama=$tipoCama;
    }
    public function getCama(){
        return $this->tipoCama;
    }
    public function setCama($tipoCama){
        $this->tipoCama = $tipoCama;
    }

    /**La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar la función 
    venderPasaje(pasajero)que registra la venta de un viaje al pasajero que es recibido por parámetro. 
    La venta se realiza solo si hayPasajesDisponible. Si el viaje es terrestre y el asiento es cama, se incrementa el 
    importe un 25%. Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, si el viaje 
    además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%. 
    Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. 
    El método retorna el importe del pasaje si se pudo realizar la venta. */

    public function venderPasaje($pasajero){
        $pasajeDisp=parent::hayPasajesDisponible();
        $precio = $this->getImporte();
        
        if ($pasajeDisp==true){
            if ($this->getCama()=="cama") {
                $precio = $precio+($precio*0.25);
            }
        }
        if ($this->getTipoSalida()=='ida y vuelta'){
            $precio = $precio+($precio*0.50);
        }
        $venta= "el viaje del pasajero/a:\n".$pasajero."\n\nes de $".$precio." total";
        return $venta;
    }



    //to string
    public function __toString(){
        $ter= "";
        $ter.=
        parent::__toString().
        "\ntipo de Cama: ". $this->getCama(); 
        return $ter;
    }
}

/* $objPersona= new Persona("juan","garnizo",12345678,963852741);
$objPersona2= new Persona("pepe","toño",12345678,963852741);
$colPersonas = [$objPersona,$objPersona2];
//$objVentas=new Ventas($viaje,$aereos,$terrestre,$objPasajero,$destino,$codigo,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp);
/* $objPersonas=$objPersonas->pasajeroPre(); 
$objPersonaRes=new personaResponsableV(45,214700,'Luciano','Pereyra');
$objViaje=new Terrestre(1,"hawai",1,10,$objPersonaRes,$colPersonas,1500,"ida","cama");

echo $objViaje; */
?>