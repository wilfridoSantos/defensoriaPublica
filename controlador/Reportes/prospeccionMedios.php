<?php

include '../conexion.php';
$sql = 'SELECT * from medios where estatus =1';
$ejecutar_consulta = $conexion->query($sql);
$datos = array();
$datos[0] = array("MEDIOS", "TOTAL PROSPECTOS");
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_medio"]);
    $sql1 = " SELECT COUNT(id_medio) as medios from prospeccion where id_medio ='$id'";
    $ejecutar = $conexion->query($sql1);
    $reg = $ejecutar->fetch_assoc();
    $tem = array(
        utf8_encode($registro["medio"]),
        (int) utf8_encode($reg["medios"]));
    $datos[$i] = $tem;
    $i++;
}
echo json_encode($datos);
