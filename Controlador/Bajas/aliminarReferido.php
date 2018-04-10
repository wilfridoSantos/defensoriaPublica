<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM referidos where id_referido ='$usuario'";
$consulta = "UPDATE referidos SET estatus = '3' WHERE id_referido = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
