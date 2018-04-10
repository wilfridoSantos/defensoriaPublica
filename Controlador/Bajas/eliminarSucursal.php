<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM sucursales where id_sucursal ='$usuario'";
$consulta = "UPDATE sucursales SET estatus = '3' WHERE id_sucursal = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;

