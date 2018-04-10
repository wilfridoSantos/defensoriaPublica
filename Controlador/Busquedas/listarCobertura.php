<?php

$valor = $_POST["valor"];
include("../conexion.php");
$sql = "select * from cobertura_seguro where tipo_de_cobertura like '%$valor%' "
        . "and estatus != 3 ORDER BY id_cobertura_seguro ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));


echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">Tipo cobertura</div>';
echo '<div class="div-table-cell">Descripcion</div>';
echo '<div class="div-table-cell">Costo por año</div>';
echo '<div class="div-table-cell">Descuento por año</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_cobertura_seguro"]);
    $nombre = utf8_encode($registro["tipo_de_cobertura"]);
    $descripcion = utf8_encode($registro["descripcion_cobertura"]);
    $costo = utf8_encode($registro["costo_por_anio"]);
    $descuento = utf8_encode($registro["descuento_por_anio"]);
    $estatus = utf8_encode($registro["estatus"]);
    $place = "";
    $tipo;
    if ($estatus == 1) {
        $place = "Cuenta Activada, pulsa el botón para Desactivarla";
        $tipo = "zmdi-swap";
    } else {
        $place = "Cuenta Desactivada, pulsa el botón para Activarla";
        $tipo = "zmdi-block";
    }
    echo '<div class="div-table-row">';
    echo '<div class="div-table-cell id="usuario">' . $i++ . '</div>';
    echo '<div class="div-table-cell">' . $nombre . '</div>';
    echo '<div class="div-table-cell">' . $descripcion . '</div>';
    echo '<div class="div-table-cell">' . $costo . '</div>';
    echo '<div class="div-table-cell">' . $descuento . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id . '" type="submit" class="btn btn-info tooltips-general" onclick="bloquearCobertura(this,' . $estatus . ')" data-toggle="tooltip" data-placement="top" title="' . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" onclick="editarCobertura(this)" data-toggle="modal" data-target="#editarCatalogo"><i class="zmdi zmdi-edit" ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-danger" onClick=\'javascript:deleteCobertura(this,"' . $nombre . '")\'  data-toggle="modal" data-target="#eliminarCatalogo"><i class="zmdi zmdi-delete"></i></button>';
    echo '</div>';
    echo '</div>';
}

