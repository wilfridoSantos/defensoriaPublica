<?php
include("../conexion.php");
$consulta = "SELECT * FROM sucursales where estatus = 1 ORDER BY nombre_suc";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="sucursal_slc" class="form-control" name="sucursal_slc" >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idSucursal = utf8_encode($registro["id_sucursal"]);
    $sucursal = utf8_encode($registro["nombre_suc"]);
    echo '<option value="' . $idSucursal . '">' . $sucursal . '</option>';
}
echo '</select>';
$conexion->close();



