<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from sucursales where id_sucursal ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo '<legend>Editar una sucursal</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Nombre sucursal:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['nombre_suc']) .
 '" id="sucursale"  readonly="" onkeypress="return soloLetras(event);" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Nombre sucursal">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Direccion:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['direccion_suc']) .
 '" id="direccion_sucursale" onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Direccion">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" value="Editar" '
 . 'onclick="updateSucursal(' . utf8_encode($registro['id_sucursal']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_suc"  style="background: #fff; border-radius: 1em;" '
 . 'class="group-material-login text-center">';
echo '</div>';





