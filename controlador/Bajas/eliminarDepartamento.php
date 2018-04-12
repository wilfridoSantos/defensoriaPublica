<?php

$usuario = $_POST["valor"];


include("../conexion.php");
$consulta = "DELETE FROM departamentos where id_departamento ='$usuario'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p  class="text-succes" ><strong>Eliminado con exito</strong></p>';
} else {
    echo '<p  class="text-danger" ><strong>Error</strong></p>';
}
