<?php

    /////////VALIDACION DEL USUARIO SIN BD///////////

 session_start();
 if($_SESSION['usuario'] != "asd"){
     header('location: login.php'); 
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script src="panel.js"></script>
    <title>Document</title>
</head>
<body>
    <input type="submit" id="formAlta" value="alta" >
    <input type="submit" id="formBaja" value="Baja" >
    <input type="submit" id="formFiltrar" value="Modificar" >
    <input type="submit" id="cerrarSession" value="cerrar Session" >
    <div id="contenido" name="contenido">
    </div>
</body>
</html>