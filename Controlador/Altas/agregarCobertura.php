<?php

$nombre      = $_POST["nombre"];
$descripcion = $_POST['descripcion'];
$costo       = $_POST["costo"];
$descuento   = $_POST["descuento"];
include "../conexion.php";
$consulta = "select * from cobertura_seguro where "
    . "tipo_de_cobertura = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs          = $ejecutar_consulta->num_rows;
$mensaje           = "";
$res               = false;
if ($num_regs == 0) {
    $consulta = "INSERT INTO cobertura_seguro "
        . "(tipo_de_cobertura,descripcion_cobertura,"
        . " costo_por_anio,descuento_por_anio,estatus) VALUES "
        . "('$nombre', '$descripcion','$costo','$descuento',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $res     = true;
        $mensaje = '<p  class="text-success" ><strong>Cobertura '
            . $nombre . ' se ha registrado con exito</strong></p>';
    } else {
        $mensaje = $mensaje = '<br><p  class="text-danger" ><strong>'
            . 'Error en el servidor intente mas tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
        . 'Ese tipo de cobertura ya esta registrado</strong></p>';
}

$resultado = array($mensaje, $res);
echo json_encode($resultado);
