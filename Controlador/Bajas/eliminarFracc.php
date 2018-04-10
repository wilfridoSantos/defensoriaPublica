<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM fraccionamientos where id_fraccionamiento ='$usuario'";
$consulta = "UPDATE fraccionamientos SET estatus = '3' WHERE id_fraccionamiento = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
$conexion->close();
