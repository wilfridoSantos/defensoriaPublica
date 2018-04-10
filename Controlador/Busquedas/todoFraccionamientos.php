<?php

include("../conexion.php");
$consulta = "SELECT * FROM fraccionamientos where estatus = 1";
$ejecutar_consulta = $conexion->query($consulta);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $logo = utf8_encode($registro['logo']);
    $nombre = utf8_encode($registro['nombre_fraccionamiento']);
    $id = utf8_encode($registro['id_fraccionamiento']);
    echo '<article class="tile">';
    echo '<a><img width="80%" src="' . $logo . '" alt="imagen" class="img-rounded" onclick="cargaFraccNoRoot('.$id.')"><a>';
    //echo '<button class="btn btn-default" value="'.$id.'" onclick="cargaFraccionamiento(this.value)"><img width="80%" src="' . $logo . '" alt="imagen" class="img-rounded"></button>';
    echo '<br>';
    echo '<label>'.$nombre.'<label>';
    echo '</article>';
}
$conexion->close();
