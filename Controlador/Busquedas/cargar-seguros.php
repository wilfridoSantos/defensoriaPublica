<?php

include '../conexion.php';
$sql = "select * from cobertura_seguro where estatus != '0'";
$ejecutar_consulta = $conexion->query($sql);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id_cobertura = utf8_encode($registro["id_cobertura_seguro"]);
    $tipo = utf8_encode($registro["tipo_de_cobertura"]);
    echo '<div class="col-md-offset-5">';
    echo '<a class="btn btn-link"  data-toggle="modal" data-target="#detalleSeguro" onclick="mostrarDetalle('.$id_cobertura.')">Detalle</a><label><input onclick="selectSeguro()" id="' . $id_cobertura . '" type="checkbox" name="optradio">&nbsp;<strong>' . $tipo . '</strong></label> ';
    echo '</div>';
}

$conexion->close();

