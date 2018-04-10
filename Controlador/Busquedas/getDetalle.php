<?php

$id = $_POST["id"];
include '../conexion.php';
$sql = "select * from cobertura_seguro where id_cobertura_seguro='$id'";
$ejecutar_consulta = $conexion->query($sql);

$registro = $ejecutar_consulta->fetch_assoc();
$id_cobertura = utf8_encode($registro["id_cobertura_seguro"]);
$costo = utf8_encode($registro["costo_por_anio"]);
$descuento = utf8_encode($registro["descuento_por_anio"]);
$descripcion = utf8_encode($registro["descripcion_cobertura"]);
echo 'Aplica en: '.$descripcion.'<br>'.'Costo por año: '.$costo.'<br>descuento por año: '.$descuento.'%';
$conexion->close();
