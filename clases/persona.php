<?php

include_once 'AccesoDatos.php';
include_once 'persona.php';

class Persona{

    private $_nombre;
    private $_apellido;
    private $_legajo;

    public function __construct($nombre , $apellido , $legajo){

      $this->_nombre = $nombre;
      $this->_apellido = $apellido;
      $this->_legajo = $legajo;
    }

    public function getLegajo(){
        return $this->_legajo;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getApellido(){
        return $this->_apellido;
    }


    public function GuardarAlumnos(){
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into alumnos (nombre , apellido , legajo)values('". $this->getNombre() ."','". $this->getApellido() ."','". $this->getLegajo() ."')"); 
		 $resultado = $consulta->execute();

         return  "se guardo alumno";
        
    }

    public static function BorrarAlumno($legajo){
        // $json["datos"]= json_decode(Estacionamiento::buscarVehiculo($patente));
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM  alumnos WHERE legajo = '$legajo'");
	$resultado = $consulta->execute();
    
    if($resultado){
         echo "<center><b class='bg-success'>El alumno se borro correctamente.<b></center>";
      
    }else{
         echo "<center><b class='bg-success'>El vehicalumnoulo no se borro correctamente.<b></center>";
    }
    }

    public function ModificarAlumno($leg){
        $nombre = $this->getNombre();
        $apellido =$this->getApellido();
        $legajo =$this->getLegajo();
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        
	    $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE alumnos SET nombre = '$nombre' , apellido = '$apellido' , legajo = '$legajo'  WHERE legajo = '$leg' ");
	    $resultado = $consulta->execute();

        return "se modifico alumno";
        
    }

    public static function TraerTodosLosAlumnos(){
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM alumnos )"); 
		 $resultado = $consulta->execute();


    }
    Public static function TraerAlumnoPorLegajo($legajo){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM alumnos WHERE legajo = '$legajo' "); 
		 $resultado = $consulta->execute();
         return $consulta->fetchAll();
    }

}



?>