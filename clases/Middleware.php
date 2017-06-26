<?php
include_once "autentificadorjwt.php";
Class Middleware{
 // next avanza una capa en la cebolla como no hay otro 
 //middleware ejecuta la api directamente sino el next iria a la otra capa de la cebolla que seria otro middleware
 // si estubiera concatenado con otro->add
public function __invoke($request, $response, $next)
{
      
        $headersArray = $request->getHeader('Authorization');
       // $response->getBody()->write($headersArray[0]);
        if(empty($headersArray[0])){
                echo "token vacio";
        }
        else{
           $token = $headersArray[0];
          $esValida= AutentificadorJwt::VerificarToken($token);
        }    
        if(is_object($esValida)){
                $response = $next($request, $response); 
        }else{
                 $response = "Token no valido";    
        }       
       
  return $response;
}
}
?>