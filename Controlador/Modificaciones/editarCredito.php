
<?php

$nombre = $_POST["credito"];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['id'];


include "../conexion.php";


$consulta = "update creditos set credito='$nombre', descripcion ='$descripcion'  where id_credito='$identificador'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    echo '<p class="text-success"><strong>Credito ' . $nombre . ' editado con exito</strong></p>';
} else {
    echo '<p class="text-success"><strong>Error en el servidor </strong></p>';
}



