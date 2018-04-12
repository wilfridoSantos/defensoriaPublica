<?php

$valor = $_POST["valor"];


include('../conexion.php');
$consulta = "SELECT * from creditos where id_credito ='$valor'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo "<legend>Editar un credito</legend>";
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">tipo de credito:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['credito']) . '" id="creditoe"  readonly="" onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="tipo credito">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Descripcion:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['descripcion']) . '" id="descripcion_creditoe" onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control " placeholder="Descripcion">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" value="Editar" onclick="updateCredito(' . utf8_encode($registro['id_credito']) . ')">';
echo '</div>';
echo '<div id="msj_editar_cat"  style="background: #fff; border-radius: 1em;" class="group-material-login text-center">';
echo '</div>';
$conexion->close();

/*var */