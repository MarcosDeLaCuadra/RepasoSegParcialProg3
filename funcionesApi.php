<?php
    include_once 'clases/persona.php';
    include_once 'clases/autentificadorjwt.php';
    class FuncionesApi{
         
          public static function TraerAlumnoPorLegajo($request){
             $leg = $request->getAttribute('legajo');
             $alumno = Persona::TraerAlumnoPorLegajo($leg);
             $alumnoJson = json_encode($alumno);
             echo $alumnoJson;
      
         }
         public static function TraerAlumnoPorLegajoPost($request){
                $legArray = $request->getParsedBody();   
                $leg = $legArray['legajo'];
                $alumno = Persona::TraerAlumnoPorLegajo($leg);
                $alumnoJson = json_encode($alumno);          
                echo $alumnoJson;
         }

           public static function AgregarAlumno($request){
               $datos = $request->getParsedBody();
               $leg =$datos['legajo'];
                $nom =$datos['nombre'];
                $ape =$datos['apellido'];  
                $alumno = new Persona($nom, $ape ,$leg);
                echo  $alumno->GuardarAlumnos();
      
         }
          public static function BorrarAlumno($request){
               
               $legArray = $request->getParsedBody();   
               $leg = $legArray['legajo'];
               $alumno = Persona::BorrarAlumno($leg);
      
         }

      public static function GuardarImagen($request , $response){
               
            $files = $request->getUploadedFiles();   
            $nombre = $files['img']->getClientFilename();
            $destino= "img/".$nombre; 

             $gestor = opendir("img");
             while (($archivo = readdir($gestor)) !== false)  {
				if($archivo == $nombre){                
                 $destino = "imgOld/".date('H-i-s'). $nombre;
               }				
			 }
         
            $files['img']->moveTo($destino);

            $response->getBody()->write($nombre);
             return $response;
         }

          public static function VerificarUsuario($request , $response){
               
            $datos = $request->getParsedBody();
            $usuario =$datos['usuario'];
            $pass =$datos['pass'];
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$pass' ");
            $resultado = $consulta->execute();
            $cantidad = $consulta->rowCount();
            $row = $consulta->fetch();

            if($cantidad == 1){
              $datos = array("usuario" => $row['usuario'], "pass" => $row['pass']);
              $token = AutentificadorJwt::CrearToken($datos);
              echo $token;
            }
            
            return $response;
         }


    }
  







?>