<?php
include_once ("Pasajeros.php");
class PasajerosCapDiferente  extends Pasajeros{
    private $sillaRequerida;
    private $asistenciaExtra;
    private $reqComidaEspecial;

    // metodo constructor 
public function __construct($nombrePasajeros,$numeroAsiento,$numeroTicket,$sillaRequerida,$asistenciaExtra,$reqComidaEspecial)
{
// invocamos al constructor pasajeros con parent
parent:: __construct($nombrePasajeros,$numeroAsiento,$numeroTicket);
      $this->sillaRequerida=$sillaRequerida;
      $this->asistenciaExtra=$asistenciaExtra;
      $this->reqComidaEspecial=$reqComidaEspecial;
}

//Metodos set y get  atributo:sillaRequerida
public function getSillaRequerida(){
    return $this->sillaRequerida;
}
public function setSillaRequerida($sillaRequerida){
    $this->sillaRequerida=$sillaRequerida;
    
}

//Metodos set y get  atributo:asistenciaExtra
public function getAsistenciaExtra(){
    return $this->asistenciaExtra;
}
public function setAsistenciaExtra($asistenciaExtra){
    $this->asistenciaExtra=$asistenciaExtra;
    
}
//Metodos set y get  atributo:reqComidaEspecial
public function getReqComidaEspecial(){
    return $this->reqComidaEspecial;
}
public function setReqComidaEspecial($reqComidaEspecial){
    $this->reqComidaEspecial=$reqComidaEspecial;
    
}

// Metodo toString REDEFINIDO
public function __toString()
{
  $cadena= parent:: __toString();
  $cadena= $cadena. "\nRequiere silla de rueda:".$this->getSillaRequerida(). "\nAsistencia para el embarque o desembarque:".$this->getAsistenciaExtra()
  . "\nRequiere Comida especial:".$this->getReqComidaEspecial();
  return $cadena;
}
 // metodo porcentaje de incremento.
public function darPorcentajeIncremento(){
    $porcentajeIncremento=0;
    $sillaRequerida= $this->getSillaRequerida();
    $asistenciaExtra= $this->getAsistenciaExtra();
    $reqComidaEspecial= $this->getReqComidaEspecial();

    if($sillaRequerida == "true" && $asistenciaExtra == "true" && $reqComidaEspecial == "true"){
        $porcentajeIncremento=30;
        
    }
    elseif($sillaRequerida == "true" && $asistenciaExtra== "false" && $reqComidaEspecial== "true"){
        $porcentajeIncremento=15;
    }
    elseif($sillaRequerida == "false" && $asistenciaExtra== "true" && $reqComidaEspecial== "false"){
        $porcentajeIncremento=15;
    }
    elseif( $sillaRequerida == "false" && $asistenciaExtra== "false" && $reqComidaEspecial== "true"){
        $porcentajeIncremento=15;
    }
    return $porcentajeIncremento;
   }
}