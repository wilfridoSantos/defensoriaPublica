<?php

include "../conexion.php";
$consulta = "select (SELECT COUNT(*)  from fraccionamientos where estatus = 1)As fraccionamiento , "
        . "(SELECT COUNT(*) from modelos where estatus = 1) as modelos;";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$registro = $ejecutar_consulta->fetch_assoc();
$datos = array(
    utf8_encode($registro["fraccionamiento"]),
    utf8_encode($registro["modelos"]));
$conexion->close();

echo json_encode($datos);


