
<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM medios where id_medio ='$usuario'";
$consulta = "UPDATE medios SET estatus = '3' WHERE id_medio = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;



