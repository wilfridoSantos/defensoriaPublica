

<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM creditos where id_credito ='$usuario'";
$consulta = "UPDATE creditos SET estatus = '3' WHERE id_credito = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
