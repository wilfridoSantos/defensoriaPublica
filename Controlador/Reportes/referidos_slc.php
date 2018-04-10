<?php

$consulta = "SELECT * FROM referidos where estatus =1 order by nombre_referido";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="referidos_slc" class="form-control" name="" >';
echo '<option value="0">TODOS</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_referido"]);
    $nombre = utf8_encode($registro["nombre_referido"]) . ' '
            . utf8_encode($registro["apellido_paterno_referido"]) . ' '
            . utf8_encode($registro["apellido_materno_referido"]);
    echo '<option value="' . $id . '">' . $nombre . '</option>';
}
echo '</select>';

$conexion->close();
