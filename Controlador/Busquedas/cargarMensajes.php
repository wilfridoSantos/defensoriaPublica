<?php

$usuario = $_POST["valor"];

include "../conexion.php";
$consulta = "SELECT remitente,nombres_usu,ape_paterno_usu,foto,count( leido)"
        . " as nleido from mensajeria INNER JOIN usuario ON "
        . "mensajeria.remitente = usuario.nom_usu where leido=0"
        . " and destinatario='$usuario' GROUP BY remitente;";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
    echo '';
} else {
    echo '<h3 ALIGN=center>No leidos</h3>';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        echo '<button id="noleido" class="btn btn-default" '
        . 'style="width:100%" type ="button" '
        . 'value="' . utf8_encode($registro["remitente"])
        . '-' . utf8_encode($registro["nombres_usu"])
        . ' ' . utf8_encode($registro["ape_paterno_usu"]) . '" '
        . 'onclick="cargarMensajes(this.value)">'
        . '<img ALIGN=left src = "' . $registro["foto"] . '" '
        . 'style="width: 40px; height :40px;" class = "img-circle"/>'
        . '<label id="nombre">' . utf8_encode($registro["nombres_usu"])
        . ' ' . utf8_encode($registro["ape_paterno_usu"])
        . '</label><label id="numeronoleido">'
        . utf8_encode($registro["nleido"]) . '</label></button>';
    }
}
