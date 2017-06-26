<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
include_once 'clases/persona.php';
include_once 'funcionesApi.php';
include_once 'clases/AccesoDatos.php';
include_once 'clases/Middleware.php';

$app = new \Slim\App;

/*$app->post('/test', function (Request $request, Response $response) {
   FuncionesApi::TraerAlumnoPorLegajoPost($request);
   // echo "entro";
    return $response;
})->add(new Middleware());*/

$app->get('/mostrar/{legajo}', function (Request $request, Response $response) {
    FuncionesApi::TraerAlumnoPorLegajo($request);
    return $response;
});

$app->post('/TraerPorPost', function (Request $request, Response $response) {
    
    FuncionesApi::TraerAlumnoPorLegajoPost($request);
    return $response;
});

$app->post('/agregarAlumno', function (Request $request, Response $response) {
    
     FuncionesApi::AgregarAlumno($request);    
    return $response;
})->add(new Middleware());

$app->post('/borrarAlumno', function (Request $request, Response $response) {

    FuncionesApi::BorrarAlumno($request);     
    return $response;
})->add(new Middleware());
/*-----IMAGEN-----*/

$app->post("/imagen", function (Request $request, Response $response) {
 
  FuncionesApi::GuardarImagen($request ,$response); 
})->add(new Middleware());

$app->post("/verificarUsuario", function (Request $request, Response $response) {
 
  FuncionesApi::VerificarUsuario($request ,$response); 
       
});

$app->run();