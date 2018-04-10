<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from ocupaciones where id_ocupacion ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo "<legend>Editar una Ocupacion</legend>";
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">ocupacion:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['ocupacion']) . '" id="ocupacione"'
 . '  readonly="" onkeypress="return soloLetras(event);" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Ocupacion">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Descripcion:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['descripcion'])
 . '" id="descripcion_ocupacione" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Descripcion">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" value="Editar" '
 . 'onclick="updateOcupacion(' . utf8_encode($registro['id_ocupacion']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_ocu"  style="background: #fff; border-radius: 1em;"'
 . ' class="group-material-login text-center">';
echo '</div>';
$conexion->close();


