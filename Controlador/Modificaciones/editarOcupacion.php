<?php

$nombre = $_POST["credito"];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['id'];
include "../conexion.php";
$consulta = "update ocupaciones set ocupacion='$nombre',descripcion ='"
        . "$descripcion'  where id_ocupacion='$identificador'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p  class="text-success" ><strong>'
    . 'Editado con exito</strong></p>';
} else {
    echo '<p  class="text-danger" ><strong>'
    . 'Error en el servidor intente mas tarde</strong></p>';
}



