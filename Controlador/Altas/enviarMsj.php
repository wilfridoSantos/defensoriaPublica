<?php

$usuario  = $_POST["usuario1"];
$usuario2 = $_POST["usuario2"];
$mensaje  = $_POST["text"];
include "../conexion.php";
$consulta = "INSERT INTO mensajeria "
    . "(remitente,destinatario,fecha_msj,mensaje_txt,leido) "
    . "VALUES('$usuario','$usuario2',NOW(),'$mensaje',0);";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
