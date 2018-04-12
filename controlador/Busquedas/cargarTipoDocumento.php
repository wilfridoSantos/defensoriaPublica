<?php

$curp = $_POST["curp"];

function mensajes($c) {
    include "../conexion.php";
    $consulta = "select * from tipo_documentos where estatus = '1'";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    $i = 0;
    $reg = array();
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $idtem= utf8_encode($registro["id_documento"]);
        $consulta2 = "select datos_documentos FROM documentos where"
                . " id_documento ='$idtem' and id_prospecto='$c'";
        $ejecutar_consulta2 = $conexion->query(utf8_decode($consulta2));
        $registro2 = $ejecutar_consulta2->fetch_assoc();
        $tem = array(
            utf8_encode($registro["id_documento"]),
            utf8_encode($registro["nombre_documento"]),
            utf8_encode($registro["estatus"]),
            utf8_encode($registro2["datos_documentos"]));

        $reg[$i] = $tem;
        $i++;
    }
    return $reg;
}

echo json_encode(mensajes($curp));
