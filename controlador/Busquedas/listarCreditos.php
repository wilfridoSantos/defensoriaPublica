<?php

$valor = $_POST["valor"];

include("../conexion.php");
$sql = "select * from creditos where credito like '%$valor%' and estatus != 3 ORDER BY id_credito ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">Credito</div>';
echo '<div class="div-table-cell">Descripcion</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $place = "";
    $tipo;
    if (utf8_encode($registro["estatus"]) == "1") {
        $place = "Cuenta Activada, pulsa el botón para Desactivarla";
        $tipo = "zmdi-swap";
    } else {
        $place = "Cuenta Desactivada, pulsa el botón para Activarla";
        $tipo = "zmdi-block";
    }
    $temporal = utf8_encode($registro["id_credito"]);
    echo '<div class="div-table-row">';
    echo '<div class="div-table-cell id="usuario">' . $i++ . '</div>';
    echo '<div class="div-table-cell">' . utf8_encode($registro["credito"]) . '</div>';
    echo '<div class="div-table-cell">' . utf8_encode($registro["descripcion"]) . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $temporal . '" value="' . $temporal . '" type="submit" class="btn btn-info tooltips-general" onclick="bloquearCredito(this,' . utf8_encode($registro["estatus"]) . ')" data-toggle="tooltip" data-placement="top" title="' . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $temporal . '" class="btn btn-success" onclick="editarCredito(this)" data-toggle="modal" data-target="#editarCatalogo"><i class="zmdi zmdi-edit" ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $temporal . '" class="btn btn-danger" onClick=\'javascript:deleteCredito(this,"' . utf8_encode($registro["credito"]) . '")\' data-toggle="modal" data-target="#eliminarCatalogo"><i class="zmdi zmdi-delete"></i></button>';
    echo '</div>';
    echo '</div>';
}
