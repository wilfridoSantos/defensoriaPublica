<?php

$curp_obtenida = $_POST["valor"];

function obtenerDatos($curp) {
    include('../conexion.php');
    $consulta = "SELECT * FROM prospeccion p "
            . "INNER JOIN detalle_prospeccion d ON p.curp = d.curp "
            . "INNER JOIN medios m ON m.id_medio = p.id_medio "
            . "INNER JOIN ocupaciones o on o.id_ocupacion = p.id_ocupacion "
            . "where p.curp ='$curp'";
    $ejecutar_consulta = $conexion->query($consulta);
    $registro = $ejecutar_consulta->fetch_assoc();
    $datos = array(
        utf8_encode($registro['nombres']),
        utf8_encode($registro['apellido_paterno']),
        utf8_encode($registro['apellido_materno']),
        utf8_encode($registro['calle_direccion']),
        utf8_encode($registro['numero_direccion']),
        utf8_encode($registro['codigo_postal']),
        utf8_encode($registro['colonia']),
        utf8_encode($registro['sexo']),
        utf8_encode($registro['fecha_nacimiento']),
        utf8_encode($registro['telefono']),
        utf8_encode($registro['fecha_inicio']),
        utf8_encode($registro['medio']),
        utf8_encode($registro['ocupacion']),
        utf8_encode($registro['nss']),
        utf8_encode($registro['clave_curp']));

    $conexion->close();
    return $datos;
}

echo json_encode(obtenerDatos($curp_obtenida));
