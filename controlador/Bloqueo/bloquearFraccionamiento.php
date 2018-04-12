<?php

$usuario = $_POST["valor"];
$estado = $_POST["tipo"];
include("../conexion.php");
if ($estado == 1) {
    $consulta = "UPDATE fraccionamientos SET estatus = '0' WHERE id_fraccionamiento = '$usuario' ";
} else {
    $consulta = "UPDATE fraccionamientos SET estatus = '1' WHERE id_fraccionamiento = '$usuario' ";
}
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;



