<?php


$consulta = "SELECT * FROM medios where estatus = 1 ORDER BY medio";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="medio_slc" class="form-control" name="medio_slc"  >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idMedio = utf8_encode($registro["id_medio"]);
    $medio = utf8_encode($registro["medio"]);
    echo '<option value="' . $idMedio . '">' . $medio . '</option>';
}
echo '</select>';

