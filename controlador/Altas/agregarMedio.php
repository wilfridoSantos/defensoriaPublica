<?php

$nombre = $_POST["credito"];
$descripcion = $_POST['descripcion'];
$res = false;
include "../conexion.php";
$consulta = "select * from medios where medio = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje = "";
if ($num_regs == 0) {
    $consulta = "INSERT INTO medios "
            . "(medio,descripcion, estatus) VALUES "
            . "('$nombre', '$descripcion',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $res = true;
        $mensaje = '<p  class="text-success" ><strong>'
                . 'Registro exitoso</strong></p>';
    } else {
        $mensaje = '<p  class="text-danger" ><strong>'
                . 'Error en el servidor intente mas tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Ese medio ya se encuentra registrado</strong></p>';
}
$result = array($mensaje, $res);
echo json_encode($result);

