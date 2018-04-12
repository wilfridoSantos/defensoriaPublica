<?php

$nombre = $_POST["nombre"];
$url = $_POST['url'];
$fracc = $_POST['fracc'];
$res = false;
include "../conexion.php";
$consulta = "select * from modelos where nombre_modelo = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje = "";
if ($num_regs == 0) {
    $consulta = "INSERT INTO modelos "
            . "(fraccionamiento,nombre_modelo,url, estatus) VALUES "
            . "('$fracc', '$nombre','$url',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $res = true;
        $mensaje = '<p  class="text-success" ><strong>Modelo ' . $nombre 
                . ' registrado con exito</strong></p>';
    } else {
        $mensaje = '<p  class="text-danger" ><strong>'
                . 'Error en el servidor intente más tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Ese modelo ya se encuentra registrado</strong></p>';
}
$result = array($mensaje, $res);
echo json_encode($result);
