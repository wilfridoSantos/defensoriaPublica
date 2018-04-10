<?php

$consulta = "SELECT * FROM ocupaciones where estatus =1 order by ocupacion";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="ocupacion_slc" class="form-control" name="" >';
echo '<option value="0">TODOS</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_ocupacion"]);
    $nombre = utf8_encode($registro["ocupacion"]);
    echo '<option value="' . $id . '">' . $nombre . '</option>';
}
echo '</select>';

