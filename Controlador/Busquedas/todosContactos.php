<?php

$usuario = $_POST["valor"];
$buscar = $_POST["buscar"];

include "../conexion.php";
$consulta = "select nom_usu,nombres_usu,ape_paterno_usu,foto from usuario"
        . " where nom_usu != '$usuario' and"
        . " CONCAT(nombres_usu,' ',ape_paterno_usu) like '%"
        . $buscar . "%' ORDER BY nombres_usu ASC limit 5;";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));

while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $usuarioget = utf8_encode($registro["nom_usu"]);
    $nombre = utf8_encode($registro["nombres_usu"]);
    $apellido = utf8_encode($registro["ape_paterno_usu"]);
    $foto = $registro["foto"];
    echo'<button class="btn btn-default" style="width:100%" '
    . 'type ="button" value="' . $usuarioget . "-" . $nombre .
    ' ' . $apellido .
    '"id="' . $usuarioget . '" onclick="cargarMensajes(this.value)">'
    . '<img ALIGN=left src = "' .
    $foto . '" style="width: 40px; height :40px;" '
    . 'class = "img-circle"/><label>' . $nombre .
    ' ' . $apellido . '</label></button>';
}

