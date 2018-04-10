<?php
include("../conexion.php");
$fracc = $_POST["fracc"];
$lote = $_POST["lote"];
$numero = $_POST["numero"];
$consulta = "select * from departamentos WHERE (manzana='$lote' or lote ='$lote') and numero ='$numero' and id_fraccionamiento='$fracc'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
$iddept= utf8_encode($registro["id_departamento"]);
$costo = utf8_encode($registro["costo_departamento"]);
$conexion->close();
echo json_encode(array($iddept,$costo));