<?php

function getCreditos() {
    include "../conexion.php";
    $consulta = "select (SELECT COUNT(*)  from creditos where estatus = 1)As credito,"
            . " (SELECT COUNT(*)  from sucursales where estatus = 1)As sucursales,"
            . " (SELECT COUNT(*)  from medios where estatus = 1)As medio , "
            . " (SELECT COUNT(*)  from ocupaciones where estatus = 1)As ocupacion,"
            . " (SELECT COUNT(*) FROM tipo_documentos where estatus = 1) As documentos,"
            . "(SELECT COUNT(*)  from cobertura_seguro where estatus = 1)As seguros,"
            . "(SELECT COUNT(*)  from fraccionamientos where estatus = 1)As fraccionamiento , "
            . "(SELECT COUNT(*) from modelos where estatus = 1) as modelos;";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    $registro = $ejecutar_consulta->fetch_assoc();
    $datos = array(
        utf8_encode($registro['credito']),
        utf8_encode($registro['sucursales']),
        utf8_encode($registro['medio']),
        utf8_encode($registro['ocupacion']),
        utf8_encode($registro['documentos']),
        utf8_encode($registro['seguros']),
        utf8_encode($registro["fraccionamiento"]),
        utf8_encode($registro["modelos"]));
    $conexion->close();

    return $datos;
}

echo json_encode(getCreditos());


