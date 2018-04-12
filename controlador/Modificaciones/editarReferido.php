<?php

$nombre = $_POST["nombre"];
$apep = $_POST["apellidop"];
$apem = $_POST["apellidom"];
$dep = $_POST["dep"];
$valor = $_POST["valor"];
include "../conexion.php";
$consulta = "update referidos set"
        . " nombre_referido='$nombre',"
        . " apellido_paterno_referido ='$apep',"
        . " apellido_materno_referido ='$apem',"
        . " departamento ='$dep' "
        . " where id_referido='$valor'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p  class="text-success" ><strong>Referido'
    . ' editado con exito</strong></p>';
} else {
    echo '<p  class="text-danger" ><strong>'
    . 'Error en el servidor intente más tarde</strong></p>';
}
/*$consulta = "insert into referidos "
        . "(nombre_referido,apellido_paterno_referido,apellido_materno_referido,departamento,estatus) values "
        . "('$nombre','$apep','$apem','$dep','1')";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    $res = true;
    $mensaje = '<p  class="text-success" ><strong>'
            . 'Referido ingresado con exito</strong></p>';
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Error en el servidor intente mas tarde</strong></p>';
}*/
