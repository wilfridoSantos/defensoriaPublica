<?php

$valor = $_POST["valor"];
include("../conexion.php");
$sql = "select * from sucursales where nombre_suc like '%$valor%' "
        . "and estatus != 3 ORDER BY id_sucursal ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">Id</div>';
echo '<div class="div-table-cell">Sucursal</div>';
echo '<div class="div-table-cell">Dirección</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '</div>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_sucursal"]);
    $sucursal = utf8_encode($registro["nombre_suc"]);
    $direccion = utf8_encode($registro["direccion_suc"]);
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
    echo '<div class="div-table-cell">' . $id . '</div>';
    echo '<div class="div-table-cell">' . $sucursal . '</div>';
    echo '<div class="div-table-cell">' . $direccion . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id . '" type="submit"'
    . ' class="btn btn-info tooltips-general" onclick="bloquearSucursal(this,'
    . $estatus . ')" data-toggle="tooltip" data-placement="top" title="'
    . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" '
    . 'onclick="editarSucursal(this)" data-toggle="modal" '
    . 'data-target="#editarCatalogo"><i class="zmdi zmdi-edit" ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-danger" '
    . 'onClick=\'javascript:deleteSucursal(this,"' . $sucursal . '")\' data-toggle="modal" '
    . 'data-target="#eliminarCatalogo"><i class="zmdi zmdi-delete">'
    . '</i></button>';
    echo '</div>';
    echo '</div>';
}



