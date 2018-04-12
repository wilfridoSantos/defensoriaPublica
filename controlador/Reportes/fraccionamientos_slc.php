<?php

$consulta = "SELECT * FROM fraccionamientos order by nombre_fraccionamiento";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="fracc_slc" class="form-control" name="fraccionamiento_slc" >';
echo '<option value="0">TODOS</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idSucursal = utf8_encode($registro["id_fraccionamiento"]);
    $perfil = utf8_encode($registro["nombre_fraccionamiento"]);
    echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
}
echo '</select>';

