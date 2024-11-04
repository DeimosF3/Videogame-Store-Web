<?php
    session_start();
    include_once("conectar.php");
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bbdd = "productos";
    $conexion = new Conectar($servidor, $usuario, $contrasena, $bbdd);
    $usuario = $_SESSION["usuario"];
    $receptor = 2;

    $datos = json_decode(file_get_contents("php://input"),true);
    $mensaje = $datos["mensaje"];


    $conexion->hacer_consulta("INSERT INTO mensajes (usuario, receptor, mensaje, hora) VALUES (?, ?, ?, NOW())","iis",[$usuario,$receptor,$mensaje]);


    

?>
