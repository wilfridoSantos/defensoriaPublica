<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from modelos where id_modelo ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo "<legend>Editar un modelo</legend>";
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Nombre:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['nombre_modelo']) . '" id="nombre_modeloe"'
 . '  readonly="" onkeypress="return soloLetras(event);" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="nombre_modelo">';
echo '</div>';
echo '</div>';
$sql="SELECT * FROM fraccionamientos order by nombre_fraccionamiento";
$ejec_consul = $conexion->query($sql);

echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Fraccionamiento:</label>';
echo '<div class = "col-xs-7" id = "fraccionamientos">';
echo '<select id="fraccionamiento_slc" class="form-control" name="fraccionamiento_slc" ">';
while ($reg = $ejec_consul->fetch_assoc()) {
    $idSucursal = utf8_encode($reg["id_fraccionamiento"]);
    $perfil = utf8_encode($reg["nombre_fraccionamiento"]);
    if ($idSucursal == utf8_encode($registro['id_fraccionamiento'])) {
        echo '<option selected value="' . $idSucursal . '">'
        . $perfil . '</option>';
    } else {
        echo '<option value="' . $idSucursal . '">'
        . $perfil . '</option>';
    }
}
echo '</select>';

echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">URL:</label>';
echo '<div class="col-xs-7">';
echo '<input  value="' . utf8_encode($registro['url'])
 . '" id="url_modeloe" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="url">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" value="Editar" '
 . 'onclick="updateModelo(' . utf8_encode($registro['id_modelo']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_modelo"  style="background: #fff; border-radius: 1em;"'
 . ' class="group-material-login text-center">';
echo '</div>';
$conexion->close();