<?php

    include_once 'clases/persona.php';
    $operacion = $_POST['operacion'];
   

   switch ($operacion) {
        case "alta":
            $nombre = $_POST['nombre'];
            $apellido =$_POST['apellido'];
            $legajo =$_POST['legajo'];
            
             $alumno = new Persona($nombre, $apellido ,$legajo);
             echo  $alumno->GuardarAlumnos();
            # code...
            break;

         case "baja":           
            $legajo =$_POST['legajo'];            
            Persona::BorrarAlumno($legajo);            
            # code...
            break;
            case "cerrarSesion":   
            session_start();        
            session_destroy();   
                 
            # code...
            break;
          case "filtrar":           
            $legajo =$_POST['legajo'];            
            $alumno = Persona::TraerAlumnoPorLegajo($legajo);

            $tabla = '<h1> MODIFICAR </h1>
                         <h1>nombre: </h1>
                        <input type="text" id="nombre1" value="'.$alumno[0]["nombre"].'" placeholder="nombre">
                        <br>
                        <h1>apellido: </h1>
                        <input type="text" id="apellido1" value="'.$alumno[0]["apellido"].'" placeholder="nombre">
                        <br>
                        <h1>legajo: </h1>
                        <input type="text" id="legajo1" value="'.$alumno[0]["legajo"].'" placeholder="nombre">
                        <br>
                       
                        <input type="hidden" id="legOriginal1" value="'. $legajo.'" placeholder="nombre">
                        <br>
                        <input type="button" value="modificar" id="modibtn">

                        ';


           echo $tabla;


            # code...
            break;   

            case "modificar":           
            $nombre = $_POST['nombre'];
            $apellido =$_POST['apellido'];
            $legajo =$_POST['legajo'];
            $legajoOriginal = $_POST['legOriginal'];     
            $alumno = new Persona($nombre, $apellido ,$legajo);
            $resp = $alumno->ModificarAlumno($legajoOriginal);
            echo $resp;
            break;

        default:
            # code...
            break;
    }


?>