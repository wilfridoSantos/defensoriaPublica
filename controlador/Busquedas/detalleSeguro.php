<?php

$id = $_POST["idseguro"];
include '../conexion.php';
$sql = "SELECT * FROM detalle_seguros d 
INNER JOIN cobertura_seguro c on d.id_cobertura = c.id_cobertura_seguro 
INNER JOIN seguros s on d.seguro = s.id_seguro
where seguro ='$id'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$i = 0;
$datos = array();
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $tem = array(
        utf8_encode($registro["tipo_de_cobertura"]),
        utf8_encode($registro["costo_por_anio"]),
        utf8_encode($registro["descuento_por_anio"]),
        utf8_encode($registro["costo_total"]),
        utf8_encode($registro["anios"])
    );
    $datos[$i] = $tem;
    $i++;
}
echo json_encode($datos);



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

