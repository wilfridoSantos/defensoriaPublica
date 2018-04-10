<?php

$valor = $_POST["valor"];
include("../../php/conexion.php");
$sql = "SELECT * FROM componente_fraccinamiento where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_encode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
    echo json_encode(false);
} else {
    $registro = $ejecutar_consulta->fetch_assoc();
    $datos = array(
        true, utf8_encode($registro["id_componente"]),
        utf8_encode($registro["radio"]),
        utf8_encode($registro["border"]),
        utf8_encode($registro["ancho"]),
        utf8_encode($registro["alto"]),
        utf8_encode($registro["tam_fuente"]));
    echo json_encode($datos);
}
/*

$sql = "select plano,ancho_plano,alto_plano from fraccionamientos where id_fraccionamiento =$valor and estatus=1";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$i = 0;
$reg = array();
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $reg[0] = utf8_encode($registro["plano"]);
    $reg[1] = utf8_encode($registro["ancho_plano"]);
    $reg[2] = utf8_encode($registro["alto_plano"]);
}
*/

