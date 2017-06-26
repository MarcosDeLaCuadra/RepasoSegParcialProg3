<?php

include_once "clases/AccesoDatos.php";



$pass = $_POST['pass'];
$usuario = $_POST['usuario'];
$cookies = $_POST['cookies'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$pass' ");
$resultado = $consulta->execute();
$cantidad = $consulta->rowCount();
$row = $consulta->fetch();

 
$error= 'false';

 if($cantidad == 1){
     
     
        if($cookies == "true"){             

            setcookie("loginEscuela",$usuario,  time()+360000 , '/');  
            echo "se creo cookie";       
            
        }
        else{
            setcookie("loginEscuela",$usuario,  time()-360000 , '/');
        }
      
    session_start();
    $_SESSION['usuario'] = $usuario;
 
    $error = 'true';
    echo "se registro correctamente";  
 }
 if($error == 'false'){

    echo 'error';

}


?>