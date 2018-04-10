<?php

$consulta = "SELECT * FROM referidos where estatus = 1 and id_referido !=0  ORDER BY nombre_referido ";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="referido_slc" class="form-control" name="referido_slc" >';
echo '<option value="0">--NINGUN REFERIDO--</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idSucursal = utf8_encode($registro["id_referido"]);
    $sucursal = utf8_encode($registro["nombre_referido"]) . ' '
            . utf8_encode($registro["apellido_paterno_referido"]) . ' '
            . utf8_encode($registro["apellido_materno_referido"]);
    echo '<option value="' . $idSucursal . '">' . $sucursal . '</option>';
}
echo '</select>';
$conexion->close();

