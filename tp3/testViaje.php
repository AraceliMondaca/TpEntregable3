<?php 
//Araceli Mondaca fai-2147 y Felipe Flores fai-2466
include_once ('Persona.php');
include_once ('personaResponsableV.php');
include_once ('Viaje.php');
include_once ('Terrestre.php');
include_once ('Aereo.php');


$objPersona= new Persona("juan","garnizo",12345678,963852741);
$objPersona2= new Persona("pepe","toño",12345678,963852741);
$colPersonas = [$objPersona,$objPersona2];
$objPersonaRes=new personaResponsableV(45,214700,'Luciano','Pereyra');
$objViaje=new Viaje(1,"hawai",1,10,$objPersonaRes,$colPersonas,1500,"ida");
/**
 * es un string con el menu de opciones que pude realizar el cliente
 * @return int
 */

/**
 * obtiene los datos y los devuelve en un arreglo
 */
function obtenerDatos(){
   
    echo"Nombre: ";
    $nombre=trim(fgets(STDIN));
    echo"Apellido: ";
    $apellido=trim(fgets(STDIN)); 
    echo"DNI: ";
    $numeDocumento=trim(fgets(STDIN));
    echo "Telefono: ";
    $telefono=trim(fgets(STDIN));
    $pasajero=[$nombre,$apellido,$numeDocumento,$telefono];
    return $pasajero;
} 

//$objPersonaRes=new personaResponsableV($numEmpleado,$numlicencia,$nombre,$apellido); 
//$ejecucion=true;

do {
    echo "\n--------------------Opciones-------------------
    opcion 1: Agregar pasajero
    opcion 2: Quitar pasajero
    opcion 3: Modificar pasajero
    opcion 4: Ver viaje 
    opcion 5: Modificar el destino del viaje
    opcion 6: Modificar el codigo
    opcion 7: Modificar la cantidad de pasajeros 
    opcion 8: Mostrar datos del responsable
    opcion 9: Modificar datos del responable
    opcion 10: Vender pasaje
    opcion 0: salir.\n";

    $opc=trim(fgets(STDIN));
    switch ($opc) {
        case 1:
            if($objViaje->hayPasajesDisponible()){
                echo "Ingrese los datos del pasajero: \n";
                echo"Nombre: ";
                $nombre=trim(fgets(STDIN));
                echo"Apellido: ";
                $apellido=trim(fgets(STDIN)); 
                echo"DNI: ";
                $numeDocumento=trim(fgets(STDIN));
                echo "Telefono: ";
                $telefono=trim(fgets(STDIN));
                //$pasajero = obtenerDatos();

                echo $objViaje->agregarPasajero($nombre,$apellido,$numeDocumento,$telefono)? "\nNo se Agrego, el pasajero ya exise" : "\nSe agrego";
            }else{
                echo "No hay mas pasajes en este viaje.\n";
            }            
            break;
         
        case 2:
                echo "Ingrese los datos del pasajero a quitar: \n";
                $pasajero = obtenerDatos();
                echo $objViaje->reducir($pasajero);
                break;

        case 3:
                 //$pasajero = obtenerDatos();
                echo $objViaje;
                
                echo "Ingrese el nombre del pasajero a modificar: \n";
                echo"Nombre: ";
                $nombre=trim(fgets(STDIN));

                echo "Ingrese los nuevos datos. \n";
                echo"Nombre: ";
                $nombreN=trim(fgets(STDIN));
                echo"Apellido: ";
                $apellido=trim(fgets(STDIN)); 
                echo"DNI: ";
                $numeDocumento=trim(fgets(STDIN));
                echo "Telefono: ";
                $telefono=trim(fgets(STDIN));
                if($objViaje->modificarDatos($nombre,$nombreN,$apellido,$numeDocumento,$telefono)){
                    echo "\nSe modifico correctamente!!";
                }else {
                    echo "\nNo se Agrego, el pasajero NO exise";
                }
                
                break;

        case 4:
                echo $objViaje;
                break;

        case 5:
            echo "El viaje con destino a: {$objViaje->getDestino()}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        
        
       case 6:
                echo "El viaje posee el código: {$objViaje->getCodigo()}. \n";
                echo "Ingrese el nuevo código: \n";
                $codigo = trim(fgets(STDIN));
                $codigo = intval($codigo);
                $objViaje->setCodigo($codigo);
                break;
        
        case 7:
            echo "El viaje posee {$objViaje->getCantidadMaxPasajeros()} de pasajes. \n";
            echo "Ingrese la nueva cantidad de pasajes: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $objViaje->setCantidadMaxPasajeros($cantidadAsientos);
            break;
            case 8:
                echo $objPersonaRes;
                break;
            
            case 9:
                echo "modifique los datos del responsable:\n"."Numero de empleado:\n";
                $numEmpleado=trim(fgets(STDIN))."\n";
                echo"Ingrese numero de licencia:\n";
                $numLicencia=trim(fgets(STDIN))."\n";
                echo"Nombre responsable:\n";
                $nombre=trim(fgets(STDIN))."\n";
                echo"Apellido responsable:\n";
                $apellido=trim(fgets(STDIN))."\n";
                if($objViaje->modificarDatosResponsable($numEmpleado,$numLicencia,$nombre,$apellido)){
                     echo"\n nose pudo modificar";
                }else{
                    echo "\n se modifico correctamente";
                }
              
                break;
            
            case 10:
                echo "INGRESE UNA OPCION:
                1: Aereo\n
                2: Terrestre\n";
                $modoViaje = trim(fgets(STDIN));
                if($modoViaje == 1){
                    $codigo = 2;
                    $destino = "coto";
                    $pasajeroA = new Persona("toph","Beifong",1234,4321);
                    $pasA = [$pasajeroA];
                    //$viajeterreste = new Aereo($codigo,$destino,5,30,$objPersonaRes,$pasA,1000,"ida y vuelta","cama");

                    //echo $viajeterreste->venderPasaje($pasajeroT);

                }elseif($modoViaje == 2){
                    $codigo = 2;
                    $destino = "coto";
                    $pasajeroT = new Persona("toph","Beifong",1234,4321);
                    $pasT = [$pasajeroT];
                    $viajeterreste = new Terrestre($codigo,$destino,5,30,$objPersonaRes,$pasT,1000,"ida y vuelta","cama");
                    echo $viajeterreste->venderPasaje($pasajeroT);
                }else{
                    echo "Opcion incorrecta!!";
                }
                
                break;
    }
} while ($opc != 0);


?>