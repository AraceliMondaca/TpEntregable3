<?php 
class Persona{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    public function __construct($nombre,$apellido,$documento,$telefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->documento=$documento;
        $this->telefono=$telefono;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getDocumento(){
        return $this->documento;
    }
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    

    //retorna pasajeros ya cargados
    /* public function pasajeroPre(){
    
        $persona1= array();
        $persona1[0]=array('Nombre'=>'Anne','apellido'=>'Escamilla','documento'=>38465189,'telefono'=>44785632);
        $persona1[1]=array('Nombre'=>'Herry','apellido'=>'Lopez','documento'=>338465189,'telefono'=>44785632);
        $persona1[2]=array('Nombre'=>'Tomm','apellido'=>'Martinez','documento'=>338465189,'telefono'=>44785632);
        
                        for ($i=0; $i <count($persona1) ; $i++) { 
                            $persona1[$i];
                        }

                        return print_r($persona1);
    } */

    public function __toString() {
        return 
        "\nNombre: ".$this->getNombre().
        "\n Apeliido: ".$this->getApellido(). 
        "\n DNI: ".$this->getDocumento().
        "\n Telefono: ".$this->getTelefono(); 
    }
}
?>