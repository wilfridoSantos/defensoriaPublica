<?php

$usuario = $_POST["valor"];
include("../conexion.php");
$consulta = "UPDATE usuario SET estatus = '3' WHERE nom_usu = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
