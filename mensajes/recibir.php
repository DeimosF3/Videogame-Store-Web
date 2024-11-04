<?php
    /*$provincia = $_POST["provincia"];
    $direccion = $_POST["direccion"];
    $cp = $_POST["cp"];
    $tipologia = $_POST["tipologia"];
    $observaciones = $_POST["observaciones"];


    
        VALIDACION
    */
    include_once("conectar.php");
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bbdd = "usuarios";
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $conexion->hacer_consulta("INSERT INTO usuarios (usuario, password) VALUES (?, ?)","isiis",[$usuario, $contrasena]);

?>