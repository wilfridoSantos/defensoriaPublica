<?php

$valor = $_POST["valor"];
include("../conexion.php");
$sql = "select m.id_modelo,m.nombre_modelo,m.url,m.estatus,"
        . "f.nombre_fraccionamiento from modelos m INNER JOIN "
        . "fraccionamientos f on m.fraccionamiento = f.id_fraccionamiento "
        . "where m.nombre_modelo like '%$valor%' and m.estatus != 3 ORDER BY m.nombre_modelo ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));


echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">fraccionamiento</div>';
echo '<div class="div-table-cell">nombre Modelo</div>';
echo '<div class="div-table-cell">URL</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_modelo"]);
    $nombre = utf8_encode($registro["nombre_fraccionamiento"]);
    $descripcion = utf8_encode($registro["nombre_modelo"]);
    $costo = utf8_encode($registro["url"]);
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
    echo '<div class="div-table-cell id="usuario">' . $i . '</div>';
    echo '<div class="div-table-cell">' . $nombre . '</div>';
    echo '<div class="div-table-cell">' . $descripcion . '</div>';
    echo '<div class="div-table-cell">' . $costo . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id . '" type="submit" class="btn btn-info tooltips-general" onclick="bloquearModelo(this,' . $estatus . ')" data-toggle="tooltip" data-placement="top" title="' . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" onclick="editarModelo(this)" data-toggle="modal" data-target="#editarCatalogo"><i class="zmdi zmdi-edit" ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-danger" onClick=\'javascript:deleteModelo(this,"' . $nombre . '")\'  data-toggle="modal" data-target="#eliminarCatalogo"><i class="zmdi zmdi-delete"></i></button>';
    echo '</div>';
    echo '</div>';
}
