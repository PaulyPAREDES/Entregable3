<?php
require_once("Pasajeros.php");
require_once("PasajerosVIP.php");
require_once("PasajerosCapDiferente.php");
require_once("Viaje.php");

/*Obliga al usuario ingresar un numero entre el rango de las variables $min y $max:
* @param int $min
* @param int $max
* @return int 
*/
function solicitarNumeroEntre($min, $max)
{
   //int $numero
   echo "\nEliga un opcion entre ".$min." y ".$max." : "; //Agregué una linea de interacción con el usuario
   $numero = trim(fgets(STDIN));
   while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
       echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
       $numero = trim(fgets(STDIN));
   }
   return (int)$numero;
}

/**  
 * FUNCION SELECCIONAR OPCION MENU: 
 * @return int
 */
function seleccionarOpcion(){
    // int $numeroDeOpcion 
    echo "\n*********************MENÚ DE OPCIONES********************* \n";
    echo "\n1- Cargar informacion del viaje.";
    echo"\n";
    echo "\n**PARA LA DEMAS OPCIONES DEBE HABER CARGADO AL MENOS UN VIAJE**";
    echo"\n";
    echo "\n2-Ver datos cargados.";
    echo "\n";
    echo "3-vender un pasaje y mostrar precio: ";
    echo "\n";
    echo "4- consultar disponibilidad de asientos:";
    echo "\n";
    echo "\n********************************************************** \n";
    
    $numeroDeOpcion = solicitarNumeroEntre(1,4);
    return $numeroDeOpcion;
}

//FUNCION (Menú Volver al)
function  volverAlMenu (){
    // $opcionVolverMenu (cualquier tecla)
    echo "\n";
    echo " ** Presione cualquier tecla para volver al menu principal ** ";
    $opcionVolverMenu = trim(fgets( STDIN ));
        if ( $opcionVolverMenu == $opcionVolverMenu ){
    }
    
}

// PROGRAMA PRINCIPAL

do {
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu) {
        case 1: //Cargar informacion del viaje.
            echo "Ingrese el codigo del viaje:";
            $codigo= strtolower(trim(fgets(STDIN)));
            echo "Ingrese el nombre del destino:";
            $destino= ucwords( trim(fgets(STDIN)));
            echo "Ingrese la cantidad maxima de pasajero:";
            $cantidadMax= trim(fgets(STDIN));
            echo "Ingrese el costo del viaje:";
            $costoViaje= trim(fgets(STDIN));
           
            echo "Cuanto Pasajeros desea Agregar?";
            $numRes=trim(fgets(STDIN))-1;
            $costoAbonados= $numRes + 1;
           if($numRes <$cantidadMax){
                for($num=0; $num <= $numRes ; $num=$num + 1){
            echo "Este pasajero requiere silla de rueda, asistencia para el embarque o desembarque, o tiene restricciones alimentarias? si/no :\n";
               $respuesta= strtolower(trim(fgets(STDIN)));
               if($respuesta == "si"){
                echo "Ingrese los siguientes datos del Pasajeros:\n";
                   echo "El nombre:";
                   $nombrePasajeros=trim(fgets(STDIN));
                   echo "Numero de asiento:";
                   $numeroAsiento=trim(fgets(STDIN));
                   echo "Numero de Ticket:";
                   $numeroTicket=trim(fgets(STDIN));
                   echo "requiere silla de rueda? true/false:";
                   $sillaRequerida=strtolower(trim(fgets(STDIN)));;
                   echo "requiere asistencia para el embarque o desembarque? true/false:";
                   $asistenciaExtra=strtolower(trim(fgets(STDIN)));;
                   echo "tiene restricciones alimentarias?true/false:";
                   $reqComidaEspecial=strtolower(trim(fgets(STDIN)));;
                   $pasajero[$num]= new PasajerosCapDiferente($nombrePasajeros,$numeroAsiento,$numeroTicket,$sillaRequerida,$asistenciaExtra,$reqComidaEspecial);
               }
               else if($respuesta == "no"){
               echo "Tiene millas acomuladas? si/no:";
               $respuesta= strtolower(trim(fgets(STDIN)));
                      if($respuesta == "si"){
                        echo "Ingrese los siguientes datos del Pasajeros:\n";
                        echo "El nombre:";
                        $nombrePasajeros=trim(fgets(STDIN));
                        echo "Numero de asiento:";
                        $numeroAsiento=trim(fgets(STDIN));
                        echo "Numero de Ticket:";
                        $numeroTicket=trim(fgets(STDIN));
                        echo "Ingrese el numero del viajero frecuente:";
                        $numViajeroFrecuente=trim(fgets(STDIN));
                        echo "Ingrese la cantidad de millas:";
                        $cantMillasPasajeros=trim(fgets(STDIN));
                        $pasajero[$num]= new PasajerosVip($nombrePasajeros,$numeroAsiento,$numeroTicket,$numViajeroFrecuente,$cantMillasPasajeros);
                      }
                      else{
                        echo "Ingrese los siguientes datos del Pasajeros:\n";
                        echo "El nombre:";
                        $nombrePasajeros=trim(fgets(STDIN));
                        echo "Numero de asiento:";
                        $numeroAsiento=trim(fgets(STDIN));
                        echo "Numero de Ticket:";
                        $numeroTicket=trim(fgets(STDIN));
                        $pasajero[$num]= new Pasajeros($nombrePasajeros,$numeroAsiento,$numeroTicket);
                       }
                    }
                       $viaje1= new Viaje($codigo,$destino,$cantidadMax,$costoViaje,$costoAbonados,$pasajero);
                       echo "\n";
                       echo "***LOS DATOS FUERON CARGADOS CORRECTAMENTE***";
                       echo "\n";
                }
            }
            else{
                echo "***LA CANTIDAD DE PASAJERO SUPERA EL LIMITE***";
            }
            

                volverAlMenu();
    break;
    case 2:// Ver datos cargados.
                echo "LOS DATOS CARGADOS SON LOS SIGUIENTES:\n".$viaje1;
                volverAlMenu();
    break;
    case 3: //Consultar vender y verprecio del pasaje:
        $disponibilidad=$viaje1->hayPasajesDisponible();
        if($disponibilidad== true){
        echo "Este pasajero requiere silla de rueda, asistencia para el embarque o desembarque, o tiene restricciones alimentarias? si/no :\n";
        $respuesta= strtolower(trim(fgets(STDIN)));
        if($respuesta == "si"){
         echo "Ingrese los siguientes datos del Pasajeros:\n";
            echo "El nombre:";
            $nombrePasajeros=trim(fgets(STDIN));
            echo "Numero de asiento:";
            $numeroAsiento=trim(fgets(STDIN));
            echo "Numero de Ticket:";
            $numeroTicket=trim(fgets(STDIN));
            echo "requiere silla de rueda? true/false:";
            $sillaRequerida=strtolower(trim(fgets(STDIN)));;
            echo "requiere asistencia para el embarque o desembarque? true/false:";
            $asistenciaExtra=strtolower(trim(fgets(STDIN)));;
            echo "tiene restricciones alimentarias?true/false:";
            $reqComidaEspecial=strtolower(trim(fgets(STDIN)));;
            $pasajero= new PasajerosCapDiferente($nombrePasajeros,$numeroAsiento,$numeroTicket,$sillaRequerida,$asistenciaExtra,$reqComidaEspecial);
        }
        else if($respuesta == "no"){
        echo "Tiene millas acomuladas? si/no:";
        $respuesta=strtolower(trim(fgets(STDIN)));
               if($respuesta == "si"){
                 echo "Ingrese los siguientes datos del Pasajeros:\n";
                 echo "El nombre:";
                 $nombrePasajeros=trim(fgets(STDIN));
                 echo "Numero de asiento:";
                 $numeroAsiento=trim(fgets(STDIN));
                 echo "Numero de Ticket:";
                 $numeroTicket=trim(fgets(STDIN));
                 echo "Ingrese el numero del viajero frecuente:";
                 $numViajeroFrecuente=trim(fgets(STDIN));
                 echo "Ingrese la cantidad de millas:";
                 $cantMillasPasajeros=trim(fgets(STDIN));
                 $pasajero= new PasajerosVip($nombrePasajeros,$numeroAsiento,$numeroTicket,$numViajeroFrecuente,$cantMillasPasajeros);
               }
               else{
                 echo "Ingrese los siguientes datos del Pasajeros:\n";
                 echo "El nombre:";
                 $nombrePasajeros=trim(fgets(STDIN));
                 echo "Numero de asiento:";
                 $numeroAsiento=trim(fgets(STDIN));
                 echo "Numero de Ticket:";
                 $numeroTicket=trim(fgets(STDIN));
                 $pasajero= new Pasajeros($nombrePasajeros,$numeroAsiento,$numeroTicket);
                }
             }
                    $precioFinal= $viaje1->venderPasaje($pasajero);
                    echo "\n";
                    echo "LOS DATOS FUERON CARGADOS CORRECTAMENTE.";
                    echo "\nEl precio final es:".$precioFinal;
                    echo "\n";
                }
                else{
                    echo "****NO ASIENTOS DISPONIBLES****";
                }
           volverAlMenu();
         break;   
        case 4: //consultar disponibilidad de asientos:
            $disponibilidad=$viaje1->hayPasajesDisponible();
            if($disponibilidad== true){
                echo "****HAY DISPONIBILIDAD DE ASIENTOS****";
            }
            else{
                echo "****NO ASIENTOS DISPONIBLES****";
            }
            volverAlMenu();
        break;
        }
        }while ($opcionMenu !=5);
    