<?php

$codigo = $_POST["valor"];

include "../conexion.php";
$consulta = "select * FROM historial where codigo_prospecto ='$codigo';";
$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
$i = 0;
$reg = array();
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $tem = array(
        utf8_encode($registro["comentario_historial"]),
        utf8_encode($registro["hora"]),
        utf8_encode($registro["fecha"]),
        utf8_encode($registro["enviado_por"])
    );
    $reg[$i] = $tem;
    $i++;
}
echo json_encode($reg);

