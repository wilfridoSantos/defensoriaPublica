<?php

$consulta = "SELECT * FROM ocupaciones where estatus = 1 ORDER BY ocupacion";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="ocupacion_slc" class="form-control" name="ocupacion_slc"  >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idOcupacion = utf8_encode($registro["id_ocupacion"]);
    $ocupacion = utf8_encode($registro["ocupacion"]);
    echo '<option value="' . $idOcupacion . '">' . $ocupacion . '</option>';
}
echo '</select>';

