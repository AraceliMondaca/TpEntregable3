<?php 
class personaResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private$apellido;

    public function __construct($numEmpleado,$numLicencia,$nombre,$apellido) {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    

  
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function modificarResponsable(){
        
    }

    public function __toString(){
        $responsable= 
        "\nN° Empleado: ". $this->getNumEmpleado().
        "\nLicencia: ". $this->getNumLicencia().
        "\nNombre: ". $this->getNombre().
        "\nApellido: ". $this->getApellido();
        return $responsable;
    }
 }

?>