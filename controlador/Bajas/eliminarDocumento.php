<?php

$usuario = $_POST["valor"];
include("../conexion.php");
//$consulta = "DELETE FROM tipo_documentos where id_documento ='$usuario'";
$consulta = "UPDATE tipo_documentos SET estatus = '3' WHERE id_documento = '$usuario' ";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo $ejecutar_consulta;
