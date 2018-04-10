<?php

include("../conexion.php");
$consulta = "SELECT * FROM creditos  where estatus ='1' ORDER BY credito";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="credito_slc" class="form-control" name="credito_slc" >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $idSucursal = utf8_encode($registro["id_credito"]);
    $perfil = utf8_encode($registro["credito"]);
    echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
}
echo '</select>';
$conexion->close();
