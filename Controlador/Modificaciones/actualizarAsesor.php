<?php
include '../conexion.php';
$asesor = $_POST["asesor"];
$id = $_POST["usuario"];
$sql = "update detalle_prospeccion set nom_usu ='$asesor' where curp = '$id'";
$txt    = $_POST["txt"];
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$consulta = "INSERT INTO historial "
    . "(comentario_historial,hora, fecha, codigo_prospecto,enviado_por) VALUES "
    . "('$txt',now(),now(),'$id','2')";
$ejecutar = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta && $ejecutar){
    echo true;
}else{
    echo false;
}


