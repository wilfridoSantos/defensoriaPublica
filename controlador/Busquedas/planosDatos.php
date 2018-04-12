<?php

$valor = $_POST["valor"];
include("../../php/conexion.php");
$sql = "select plano,ancho_plano,alto_plano from fraccionamientos where id_fraccionamiento =$valor and estatus=1";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$i = 0;
$reg = array();
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $reg[0] = utf8_encode($registro["plano"]);
    $reg[1] = utf8_encode($registro["ancho_plano"]);
    $reg[2] = utf8_encode($registro["alto_plano"]);
}
echo json_encode($reg);
/*function obtenerCreditos($val) {
    
    $sql = "select * from sucursales where nombre_suc like '%$val%' ORDER BY id_sucursal ";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $i = 0;
    $reg = array();
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $tem = array(
            utf8_encode($registro["id_sucursal"]),
            utf8_encode($registro["nombre_suc"]),
            utf8_encode($registro["direccion_suc"]),
            utf8_encode($registro["estatus"]));
        $reg[$i] = $tem;
        $i++;
    }
    return $reg;
}

echo json_encode(obtenerCreditos($valor));*/
