<?php
class Pasajeros{
    private $nombrePasajeros;
    private $numeroAsiento;
    private $numeroTicket;

public function __construct($nombrePasajeros,$numeroAsiento,$numeroTicket)
{
   $this->nombrePasajeros= $nombrePasajeros;
   $this->numeroAsiento=$numeroAsiento;
   $this->numeroTicket=$numeroTicket;

}
// metodos set y get
 public function getNombrePasajeros(){
    return $this->nombrePasajeros;
   }
 public function setNombrePasajeros($nombrePasajeros){  
  $this->nombrePasajeros= $nombrePasajeros;
   }

 public function getNumeroAsiento(){
    return $this->numeroAsiento;
   }
 public function setNumeroAsiento($numeroAsiento){ 
  $this->numeroAsiento= $numeroAsiento;
   }

   public function getNumeroTicket(){
    return $this->numeroTicket;
   }
 public function setNumeroTicket($numeroTicket){ 
  $this->numeroTicket= $numeroTicket;
   }

  //Metodo __tostring
  public function __toString()  
  {
     $cadena="";
     $cadena= "Nombre Pasajero:".$this->getNombrePasajeros()."\nNumero de asiento:".$this->getNumeroAsiento()."\nNumero de Ticket:".$this->getNumeroTicket();
     return $cadena;
  }

  // metodo porcentaje de incremento.
  public function darPorcentajeIncremento(){
   $porcentajeIncremento=10;
   return $porcentajeIncremento;
  }
}