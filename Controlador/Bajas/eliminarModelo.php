

<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM modelos where id_modelo ='$usuario'";
$consulta = "UPDATE modelos SET estatus = '3' WHERE id_modelo = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;

