<?php
    require_once './vendor/autoload.php';

    use Firebase\JWT\JWT;

    class AutentificadorJwt{

        private static $claveSecreta = "1234";
        private static $encriptado = array('HS256');

       public static function CrearToken($datos){

           $ahora = time();
           $payload = array('iat'=> $ahora , 
                          'exp'=> $ahora + 6000 ,
                          'data' => $datos ,
                          'app' => "apirestjwt" );

            return JWT::encode($payload, self::$claveSecreta);

        }

        public static function VerificarToken($token){

         return JWT::decode($token ,self::$claveSecreta ,self::$encriptado );

        }
        public static function ObtenerPayload($token){
            return JWT::decode($token ,self::$claveSecreta ,self::$encriptado);
        }

          public static function ObtenerData($token){
            return JWT::decode($token ,self::$claveSecreta ,self::$encriptado)->data;
        }

    }


?>