<?php
include "../conexion.php";
$nombre            = $_POST["credito"];
$descripcion       = $_POST['descripcion'];
$consulta          = "select * from sucursales where nombre_suc = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs          = $ejecutar_consulta->num_rows;
$mensaje;
$res = false;
if ($num_regs == 0) {
    $consulta = "INSERT INTO sucursales "
        . "(nombre_suc,direccion_suc, estatus) VALUES "
        . "('$nombre', '$descripcion',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $res     = true;
        $mensaje = '<p  class="text-success" ><strong>'
            . 'Registro exitoso</strong></p>';
    } else {
        $mensaje = '<p  class="text-danger" ><strong>'
            . 'Error en el servidor intente mas tarde</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
        . 'Esa sucursal ya se encuentra registrada</strong></p>';
}
$result = array($mensaje, $res);
echo json_encode($result);
