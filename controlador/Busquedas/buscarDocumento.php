<?php

$usuario = $_POST["valor"];
include('../conexion.php');
$consulta = "SELECT * from tipo_documentos where id_documento ='$usuario'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
echo '<legend>Editar un documento</legend>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Tipo Docmuento:</label>';
echo '<div class="col-xs-9">';
echo '<input readonly="" value="' . utf8_encode($registro['nombre_documento'])
 . '" id="documentoe" onkeypress="return soloLetras(event);" '
 . 'onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Tipo Documento">';
echo '</div>';
echo '</div>';
echo '<div class="form-group">';
echo '<label class="control-label col-xs-3">Descripcion Docmuento:</label>';
echo '<div class="col-xs-9">';
echo '<input  value="' . utf8_encode($registro['descripcion_documento'])
 . '" id="descripcion_documentoe" onkeypress="return soloLetras(event);"'
 . ' onKeyUp="this.value = this.value.toUpperCase();" type="text" '
 . 'class="form-control " placeholder="Descripción Documento">';
echo '</div>';
echo '</div>';
echo '<div class="text-center">';
echo '<input value="Editar" type="button" class="btn btn-primary" '
 . 'value="Editar" onclick="updateDocumento('
 . utf8_encode($registro['id_documento']) . ')">';
echo '&nbsp;&nbsp;';
echo '</div>';
echo '<div id="msj_editar_doc"  style="background: #fff; border-radius: 1em;"'
 . ' class="group-material-login text-center">';
echo '</div>';


