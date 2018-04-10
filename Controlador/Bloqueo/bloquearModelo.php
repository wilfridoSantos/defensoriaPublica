<?php

$usuario = $_POST["valor"];
$estado = $_POST["tipo"];
include("../conexion.php");
if ($estado == 1) {
    $consulta = "UPDATE modelos SET estatus = '0' WHERE id_modelo = '$usuario' ";
} else {
    $consulta = "UPDATE modelos SET estatus = '1' WHERE id_modelo = '$usuario' ";
}
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));

