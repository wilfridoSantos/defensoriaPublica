<?php
include '../conexion.php';
$sql = "select * from cobertura_seguro where estatus != '0'";
$ejecutar_consulta = $conexion->query($sql);
$datos = array();
$tem =0 ;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id_cobertura = utf8_encode($registro["id_cobertura_seguro"]);
    $costo= utf8_encode($registro["costo_por_anio"]);
    $descuento= utf8_encode($registro["descuento_por_anio"]);
    $datostem = array($id_cobertura,$costo,$descuento);
    $datos[$tem]=$datostem;
    $tem++;
}
echo json_encode($datos);
$conexion->close();
