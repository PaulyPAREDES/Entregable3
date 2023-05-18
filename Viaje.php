<?php
require_once("Pasajeros.php");
require_once("PasajerosVIP.php");
require_once("PasajerosCapDiferente.php");

class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajero;
    private $costoViaje;
    private $costoAbonados;
    private $colPasajeros;
    private $objPasajeros;


    public function __construct($codigo,$destino,$cantMaxPasajero,$costoViaje,$costoAbonados,$objPasajeros)
    {
        $this->codigo=$codigo;
        $this->destino =$destino;
        $this->cantMaxPasajero = $cantMaxPasajero;
        $this->costoViaje=$costoViaje;
        $this->costoAbonados=$costoAbonados;
        $this->objPasajeros=$objPasajeros;
    }

    // metodos get y set
    public function getCodigo(){
        return $this->codigo;
       }
       public function setCodigo($codigo){
      $this->codigo= $codigo;
       }
   
       public function getDestino(){
           return $this->destino;
       }
       public function setDestino($destino){
          $this->destino= $destino;
       }
   
       public function getCantMaxPasajero(){
           return $this->cantMaxPasajero;
       }
       public function setCantMaxPasajero($cantMaxPasajero){
          $this->cantMaxPasajero= $cantMaxPasajero;
       }

       public function getCostoViaje(){
        return $this->costoViaje;
       }
      public function setCostoViaje($costoViaje){
       $this->costoViaje= $costoViaje;
       }

       public function getCostoAbonados(){
        return $this->costoAbonados;
       }
      public function setCostoAbonados($costoAbonados){
       $this->costoAbonados= $costoAbonados;
       }

       public function getObjPasajeros(){
        return $this->objPasajeros;
    }
    public function setObjPasajeros($objPasajeros){
       $this->objPasajeros= $objPasajeros;
    }

 // funcion mostrar datos PASAJEROS
 private function mostrarObjPasajeros()
 {
    $coleccionPasajero = $this->getObjPasajeros();
    $mensaje = "";
    $cantidad = count($coleccionPasajero);
    for ($i = 0; $i < $cantidad; $i++) {
            $mensaje = $mensaje."\n".$coleccionPasajero[$i];
        }
    return $mensaje;
 }

 //Metodo __tostring
 public function __toString()
 {
    $cadena="";
    $cadena="DATOS DEL VIAJE:\n Codigo:".$this->getCodigo()."\n Destino:".$this->getDestino()."\n Cantidad maxima de pasajeros:".$this->getCantMaxPasajero()
    ."\n Costo del vaje:".$this->getCostoViaje()."$"."\n Costo abonados:".$this->getCostoAbonados()."\n "."DATOS DE LOS PASAJEROS \n".$this-> mostrarObjPasajeros();
    return $cadena;
 }

 public function venderPasaje($objPasajeros){
    $costoAbonados = $this->getCostoAbonados();
    $hayDisponible=$this->hayPasajesDisponible() ;
    $costoFinal= $this->getCostoViaje();
    $porcentaje= $objPasajeros->darPorcentajeIncremento();
    $colPasajeros= $this->getObjPasajeros();
  if($hayDisponible== true){
     $colPasajeros[]=$objPasajeros;
     $costoAbonados = $costoAbonados+ 1;
     $this->setObjPasajeros( $colPasajeros);
     $this->setCostoAbonados($costoAbonados);
     $costoFinal= $costoFinal +($costoFinal* $porcentaje)/100;
  } 
  return $costoFinal;
 }

 public function hayPasajesDisponible() {
    $valor=false;
    $colPasajeros= $this->getObjPasajeros();
    if(count($colPasajeros)< $this->getCantMaxPasajero()){
        $valor=true;
    }
    return $valor;
 }

}
