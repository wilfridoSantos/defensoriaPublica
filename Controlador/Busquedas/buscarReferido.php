<?php
$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from referidos where id_referido ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo '<legend>Editar un referido</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Nombre:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['nombre_referido']) .
 '" id="nombrere"  onkeypress="return soloLetras(event);" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Nombre sucursal">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Apellido Paterno:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['apellido_paterno_referido']) .
 '" id="apellidopre" onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Direccion">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Apellido Materno:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['apellido_materno_referido']) .
 '" id="apellidomre" onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Direccion">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Departamento:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['departamento']) .
 '" id="depre" onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Direccion">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" value="Editar" '
 . 'onclick="updateReferido(' . utf8_encode($registro['id_referido']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_referido"  style="background: #fff; border-radius: 1em;" '
 . 'class="group-material-login text-center">';
echo '</div>';