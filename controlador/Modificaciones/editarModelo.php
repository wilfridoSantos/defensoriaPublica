<?php

 $nombre = $_POST["nombre"];
 $url = $_POST['url'];
 $fracc = $_POST["fracc"];
 $identificador = $_POST['id'];
include "../conexion.php";
$consulta = "update modelos set nombre_modelo='$nombre', url ='$url',fraccionamiento='$fracc'"
        . "  where id_modelo='$identificador'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p  class="text-success" ><strong>Modelo '.$nombre
    . ' editado con éxito</strong></p>';
} else {
    echo '<p  class="text-danger" ><strong>'
    . 'Error en el servidor intente más tarde</strong></p>';
}
