<?php

$valor = $_POST["valor"];
include("../conexion.php");
$sql = "select * from fraccionamientos where nombre_fraccionamiento like '%$valor%' "
        . "and estatus != 3 ORDER BY id_fraccionamiento ";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));


echo '<div class="div-table-row div-table-head">';
echo '<div class="div-table-cell">#</div>';
echo '<div class="div-table-cell">Nombre</div>';
echo '<div class="div-table-cell">Dirección</div>';
echo '<div class="div-table-cell">Estado</div>';
echo '<div class="div-table-cell">Actualizar</div>';
echo '<div class="div-table-cell">Eliminar</div>';
echo '<div class="div-table-cell">Departamentos</div>';
echo '</div>';
$i = 1;
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["id_fraccionamiento"]);
    $nombre = utf8_encode($registro["nombre_fraccionamiento"]);
    $direccion = utf8_encode($registro["ubicacion_fraccionamiento"]);
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
    echo '<div class="div-table-cell id="usuario">' . $nombre . '</div>';
    echo '<div class="div-table-cell id="usuario">' . $direccion . '</div>';
    echo '<div class="div-table-cell">';
    echo '<button id="' . $id . '" value="' . $id . '" type="submit" class="btn btn-info tooltips-general" onclick="bloquearFraccionamiento(this,' . $estatus . ')" data-toggle="tooltip" data-placement="top" title="' . $place . '"><i class="zmdi ' . $tipo . '"></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value="' . $id . '" class="btn btn-success" onclick="editarFraccionamiento(this)" data-toggle="modal" data-target="#editarCatalogo"><i class="zmdi zmdi-edit" ></i></button>';
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo "<button value ='" . $id . "' class='btn btn-danger' onclick=\"javascript:eliminarFraccionamiento(this,'" . $nombre . "')\" data-toggle='modal' data-target='#eliminarCatalogo'><i class='zmdi zmdi-delete'></i></button>";
    echo '</div>';
    echo '<div class="div-table-cell">';
    echo '<button value ="' . $id . '" class="btn btn-warning" onclick="agregarDepartamentos(this)"  data-target="#eliminarCatalogo"><i class="zmdi zmdi-home"></i></button>';
    echo '</div>';
    echo '</div>';
}
