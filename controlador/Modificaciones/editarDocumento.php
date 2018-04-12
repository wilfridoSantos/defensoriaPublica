<?php

$nombre = $_POST["credito"];
$identificador = $_POST['id'];
$descripcion = $_POST["descripcion"];
include "../conexion.php";
$consulta = "update tipo_documentos set nombre_documento='$nombre'"
        . " , descripcion_documento='$descripcion' "
        . "where id_documento='$identificador'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p class="text-success"><strong>Tipo de documento '
    . $nombre . ' editado con exito</strong></p>';
} else {
    echo '<p class="text-success"><strong>'
    . 'Error en el servidor intente más tarde</strong></p>';
}





