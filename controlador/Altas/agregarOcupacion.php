<?php

$nombre = $_POST["credito"];
$descripcion = $_POST['descripcion'];
include "../conexion.php";
$consulta = "select * from ocupaciones where ocupacion = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje;
$resp = false;
if ($num_regs == 0) {
    $consulta = "INSERT INTO ocupaciones "
            . "(ocupacion,descripcion, estatus) VALUES "
            . "('$nombre', '$descripcion',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $resp = true;
        $mensaje = '<p  class="text-success" ><strong>'
                . 'Registro exitoso</strong></p>';
    } else {
        $mensaje = '<p  class="text-danger" ><strong>'
                . 'Error en el servidor intente mas tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Esa ocupacion ya se encuentra registrado</strong></p>';
}
$result = array($mensaje, $resp);
echo json_encode($result);


