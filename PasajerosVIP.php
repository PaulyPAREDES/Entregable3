<?php
include_once ("Pasajeros.php");
class PasajerosVip  extends Pasajeros{
    private $numViajeroFrecuente;
    private $cantMillasPasajeros;

// metodo constructor 
public function __construct($nombrePasajeros,$numeroAsiento,$numeroTicket,$numViajeroFrecuente,$cantMillasPasajeros)
{
// invocamos al constructor pasajeros con parent
parent:: __construct($nombrePasajeros,$numeroAsiento,$numeroTicket);
      $this->numViajeroFrecuente=$numViajeroFrecuente;
      $this->cantMillasPasajeros=$cantMillasPasajeros;

}
//Metodos set y get  atributo:$viajeroFrecuente
public function getNumViajeroFrecuente(){
    return $this->numViajeroFrecuente;
}
public function setNumViajeroFrecuente($numViajeroFrecuente){
    $this->numViajeroFrecuente=$numViajeroFrecuente;
    
}

//Metodos set y get  atributo:$cantMillasPasajeros
public function getCantMillasPasajeros(){
    return $this->cantMillasPasajeros;
}
public function setCantMillasPasajeros($cantMillasPasajeros){
    $this->cantMillasPasajeros=$cantMillasPasajeros;
    
}

// Metodo toString REDEFINIDO
public function __toString()
{
  $cadena= parent:: __toString();
  $cadena= $cadena. "\nNumero de Viajero frecuente:".$this->getNumViajeroFrecuente(). "\nCantidad de Millas:".$this->getCantMillasPasajeros();
  return $cadena;
}

// metodo porcentaje de incremento.
public function darPorcentajeIncremento(){
    $porcentajeIncremento=35;
    $cantMillasPasajeros= $this->getCantMillasPasajeros();
    if($cantMillasPasajeros > 300){
        $porcentajeIncremento=35 + 30;
    }
    return $porcentajeIncremento;
   }

}