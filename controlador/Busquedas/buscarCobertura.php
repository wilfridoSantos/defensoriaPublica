<?php

$usuario = $_POST["valor"];

include('../conexion.php');
$consulta = "SELECT * from cobertura_seguro where "
        . "id_cobertura_seguro ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo '<legend>Editar cobertura</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Cobertura aplicada en:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['tipo_de_cobertura'])
 . '" id="coberturae"  readonly="" onkeypress="return soloLetras(event);"'
 . ' onKeyUp="this.value = this.value.toUpperCase();" '
 . 'type="text" class="form-control " placeholder="tipo cobertura">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Descripcion:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['descripcion_cobertura'])
 . '" id="descripcion_coberturae" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" '
 . 'type="text" class="form-control " placeholder="Descripcion">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Costo anual:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['costo_por_anio'])
 . '" id="costo_anuale" onKeyUp="this.value = this.value.toUpperCase();" '
 . 'type="text" class="form-control " placeholder="Costo anual">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">'
 . 'Porcentaje de descuento anual:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['descuento_por_anio'])
 . '" id="descuento_anuale" onKeyUp="this.value = this.value.toUpperCase();"'
 . ' type="text" class="form-control " placeholder="Descuento anual">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" '
 . 'value="Editar" onclick="updateCobertura('
 . utf8_encode($registro['id_cobertura_seguro']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_seg"  style="background: #fff;'
 . ' border-radius: 1em;" class="group-material-login text-center">';
echo '</div>';
$conexion->close();

