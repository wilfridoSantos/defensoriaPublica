<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from fraccionamientos where id_fraccionamiento ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();

echo '<legend>Registro de un fraccionamiento</legend>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Nombre del fraccionamiento:</label>';
echo '<div class = "col-xs-7">';
echo '<input readonly="" value="' . utf8_encode($registro["nombre_fraccionamiento"]) . '" id = "nombre-fraccionamientoe" onKeyUp = "this.value = this.value.toUpperCase();" type = "text" class = "form-control " placeholder = "Nombre del fraccionamiento">';
echo '</div>';
echo '</div>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Direccion:</label>';
echo '<div class = "col-xs-7">';
echo '<input value="' . utf8_encode($registro["ubicacion_fraccionamiento"]) . '" id = "ubicacion_fraccionamientoe" onKeyUp = "this.value = this.value.toUpperCase();" type = "text" class = "form-control " placeholder = "Direccion del fraccionamiento">';
echo '</div>';
echo '</div>';
echo '<div class = "form-group">';
echo '<label class = "control-label col-xs-3">Logo:</label>';
echo '<div class = "col-xs-7">';
echo '<input id = "logo-fraccionamientoe" type = "file" accept = "image/x-png" >';
echo '</div>';
echo '</div>';
echo '<div class = "text-center">';
echo '<img id="logoimg" src="'.utf8_encode($registro["logo"]).'" alt="" width="200px" class="img-rounded">';
echo '</div>';
echo '<br>';
echo '<div class = "form-group">';
echo '<div class = "col-xs-offset-5 col-xs-6">';
echo '<input  type = "button" class = "btn btn-primary" value = "Editar" onclick = "updateFraccionamiento('. utf8_encode($registro["id_fraccionamiento"]) .')">';
echo '</div>';
echo '</div>';
echo '<div id = "mensaje_fraccionamientoe" style = "background: #fff; border-radius: 1em;" class = "group-material-login text-center">';
echo '</div>';

