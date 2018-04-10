<?php

$valor = $_POST["valor"];

include("../conexion.php");
$sql = "select * from medios where medio like '%$valor%' and estatus != 3 ORDER BY id_medio ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">Medio</div>';
echo '<div class="div-table-cell">Descripcion</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {

    $id = utf8_encode($registro["id_medio"]);
    $medio = utf8_encode($registro["medio"]);
    $descripcion = utf8_encode($registro["descripcion"]);
    $estatus = utf8_encode($registro["estatus"]);
    $place = "";
    $tipo;
    if ($estatus == "1") {
        $place = "Cuenta Activada, pulsa el botón para Desactivarla";
        $tipo = "zmdi-swap";
    } else {
        $place = "Cuenta Desactivada, pulsa el botón para Activarla";
        $tipo = "zmdi-block";
    }
    echo '<div class="div-table-row">';
    echo '<div class="div-table-cell id="usuario">' . $i++ . '</div>';
    echo '<div class="div-table-cell">' . $medio . '</div>';
    echo '<div class="div-table-cell">' . $descripcion . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id
    . '" type="submit" class="btn btn-info tooltips-general" '
    . 'onclick="bloquearMedio(this,' . $estatus . ')" '
    . 'data-toggle="tooltip" data-placement="top" title="' .
    $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" '
    . 'onclick="editarMedio(this)" data-toggle="modal" '
    . 'data-target="#editarCatalogo"><i class="zmdi zmdi-edit"'
    . ' ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-danger" '
    . ' onClick=\'javascript:deleteMedio(this,"' . $medio . '")\' data-toggle="modal" '
    . 'data-target="#eliminarCatalogo"><i class="zmdi zmdi-delete">'
    . '</i></button>';
    echo '</div>';
    echo '</div>';
}






