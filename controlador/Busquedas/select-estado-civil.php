<?php


$consulta = "SELECT * FROM estado_civil";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="estado_civil_slc" class="form-control" name="estado_civil_slc"  >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idSucursal = utf8_encode($registro["id_estado_civil"]);
    $perfil = utf8_encode($registro["estado_civil"]);
    echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
}
echo '</select>';


