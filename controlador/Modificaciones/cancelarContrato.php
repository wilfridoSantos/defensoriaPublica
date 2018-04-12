<?php

include '../conexion.php';
$idcontrato = $_POST["id"];
$txt = $_POST["txt"];
$codigo = $_POST['codigo'];
$consulta = "update contrato set estado_contrato='3' "
        . " where id_contrato='$idcontrato'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    $sql = "INSERT INTO historial "
            . "(comentario_historial,hora, fecha, codigo_prospecto,enviado_por) VALUES "
            . "('$txt',now(),now(),'$codigo','2')";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo 'Contrato cancelado con éxito';
    } else {
        echo 'Error en el servidor intente más tarde';
    }
} else {
     echo 'Error en el servidor intente más tarde';
}



