<?php

$usuario = $_POST["valor"];
$estado = $_POST["tipo"];
include("../conexion.php");
if ($estado == 1) {
    $consulta = "UPDATE cobertura_seguro SET estatus = '0' WHERE id_cobertura_seguro = '$usuario' ";
} else {
    $consulta = "UPDATE cobertura_seguro SET estatus = '1' WHERE id_cobertura_seguro = '$usuario' ";
}
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
