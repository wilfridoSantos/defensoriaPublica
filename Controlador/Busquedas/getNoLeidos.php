<?php

$usuario = $_POST["usuario"];
include "../conexion.php";
$consulta = "SELECT Count(leido) AS leidos FROM mensajeria "
        . "where destinatario='$usuario' and leido=0;";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$registro = $ejecutar_consulta->fetch_assoc();
$dato = utf8_encode($registro["leidos"]);
echo $dato;

