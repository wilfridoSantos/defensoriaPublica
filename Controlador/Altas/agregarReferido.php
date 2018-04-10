<?php

$nombre = $_POST["nombre"];
$apep = $_POST["apellidop"];
$apem= $_POST["apellidom"];
$dep = $_POST["dep"];
include "../conexion.php";
$consulta = "select * from referidos where nombre_referido = '$nombre' and apellido_paterno_referido ='$apep' and apellido_materno_referido = '$apem'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$num_regs = $ejecutar_consulta->num_rows;
$mensaje;
$res = false;
if ($num_regs == 0) {
    $consulta = "insert into referidos "
            . "(nombre_referido,apellido_paterno_referido,apellido_materno_referido,departamento,estatus) values "
            . "('$nombre','$apep','$apem','$dep','1')";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $res = true;
        $mensaje = '<p  class="text-success" ><strong>'
                . 'Referido ingresado con exito</strong></p>';
    } else {
        $mensaje = '<p  class="text-danger" ><strong>'
                . 'Error en el servidor intente mas tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Esa referido ya se encuentra registrado</strong></p>';
}
$result = array($mensaje, $res);
echo json_encode($result);
