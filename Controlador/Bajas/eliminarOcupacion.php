<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM ocupaciones where id_ocupacion ='$usuario'";
$consulta = "UPDATE ocupaciones SET estatus = '3' WHERE id_ocupacion = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
