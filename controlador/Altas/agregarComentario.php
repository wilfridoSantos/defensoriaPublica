<?php

$txt    = $_POST["txt"];
$codigo = $_POST['codigo'];
$rol    = $_POST["rol"];
include "../conexion.php";
$consulta = "INSERT INTO historial "
    . "(comentario_historial,hora, fecha, codigo_prospecto,enviado_por) VALUES "
    . "('$txt',now(),now(),'$codigo','$rol')";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
