<?php

$consulta = "SELECT * FROM medios where estatus =1 order by medio";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="medio_slc" class="form-control" name="" >';
echo '<option value="0">TODOS</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_medio"]);
    $nombre = utf8_encode($registro["medio"]);
    echo '<option value="' . $id . '">' . $nombre . '</option>';
}
echo '</select>';


