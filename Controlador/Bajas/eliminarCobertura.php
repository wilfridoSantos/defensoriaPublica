<?php

$usuario = $_POST["valor"];
include("../conexion.php");
$mensaje = 0;
//$consulta = "DELETE FROM cobertura_seguro where id_cobertura_seguro ='$usuario'";
$consulta = "UPDATE cobertura_seguro SET estatus = '3' WHERE id_cobertura_seguro = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;

