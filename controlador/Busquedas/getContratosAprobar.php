<?php

include "../conexion.php";
$consulta = "SELECT Count(estado_contrato) AS contrato FROM contrato where estado_contrato='0' or estado_contrato='1'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$registro = $ejecutar_consulta->fetch_assoc();
$dato = utf8_encode($registro["contrato"]);
echo $dato;
