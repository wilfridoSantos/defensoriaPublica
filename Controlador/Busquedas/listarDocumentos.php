<?php

$valor = $_POST["valor"];

include("../conexion.php");
$sql = "select * from tipo_documentos where nombre_documento like "
        . "'%$valor%' and estatus != 3 ORDER BY id_documento ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">Tipo Documento</div>';
echo '<div class="div-table-cell">Descripción</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_documento"]);
    $documento = utf8_encode($registro["nombre_documento"]);
    $descripcion = utf8_encode($registro["descripcion_documento"]);
    $estatus = utf8_encode($registro["estatus"]);
    $place = "";
    $tipo;
    if ($estatus == "1") {
        $place = "Documento activo, pulsa el botón para Desactivarla";
        $tipo = "zmdi-swap";
    } else {
        $place = "Documento desactivado, pulsa el botón para Activarlo";
        $tipo = "zmdi-block";
    }
    echo '<div class="div-table-row">';
    echo '<div class="div-table-cell" >' . $i++ . '</div>';
    echo '<div class="div-table-cell" >' . $documento . '</div>';
    echo '<div class="div-table-cell" >' . $descripcion . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id . '" type="submit" '
    . 'class="btn btn-info tooltips-general" '
    . 'onclick="bloquearDocumento(this,' . $estatus . ')" '
    . 'data-toggle="tooltip" data-placement="top" title="'
    . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" '
    . 'onclick="editarDocumento(this)" data-toggle="modal" '
    . 'data-target="#editarCatalogo"><i class="zmdi zmdi-edit" >'
    . '</i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-danger"'
    . 'onClick=\'javascript:deleteDocumentoCatalogo(this,"' . $documento . '")\'  '
    . 'data-toggle="modal" data-target="#eliminarCatalogo">'
    . '<i class="zmdi zmdi-delete"></i></button>';
    echo '</div>';
    echo '</div>';
}
