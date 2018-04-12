<?php

$nombre = $_POST["credito"];
$descripcion = $_POST["descripcion"];
include "../conexion.php";
$consulta = "select * from tipo_documentos where nombre_documento = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje = 0;
$resp = false;
if ($num_regs == 0) {
    $consulta = "INSERT INTO tipo_documentos "
            . "(nombre_documento,descripcion_documento, estatus) VALUES "
            . "('$nombre','$descripcion',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        $resp = true;
        $mensaje = "<p class='text-success'><strong>tipo de documento "
                . $nombre . " ingresado con éxito</strong></p>";
    } else {
        //error en el servidor
        $mensaje = "<p class='text-danger'><strong>"
                . "Error en el servidor intentar más tarde</strong></p>";
    }
} else {
    //credito ya existe
    $mensaje = "<p class='text-danger'><strong>El tipo de documento "
            . $nombre . " ya esta registrado</strong></p>";
}

$resultado = array($mensaje, $resp);
echo json_encode($resultado);


