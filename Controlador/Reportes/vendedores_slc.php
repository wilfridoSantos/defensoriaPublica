<?php

include "../php/conexion.php";
$consulta = "SELECT nom_usu,nombres_usu, ape_paterno_usu, ape_materno_usu FROM usuario where estatus =1 and id_perfil = 1 order by nombres_usu";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="vendedores_slc" class="form-control" name="" >';
echo '<option value="0">TODOS</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {

    $id = utf8_encode($registro["nom_usu"]);
    $nombre = utf8_encode($registro["nombres_usu"]) . ' '
            . utf8_encode($registro["ape_paterno_usu"]) . ' '
            . utf8_encode($registro["ape_materno_usu"]);
    echo '<option value="' . $id . '">' . $nombre . '</option>';
}
echo '</select>';


