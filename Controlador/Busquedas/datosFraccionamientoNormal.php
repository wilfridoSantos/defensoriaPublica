

<?php

$valor = $_POST["valor"];
include("../../php/conexion.php");
$sql = "SELECT * FROM departamentos where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_encode($sql));
$i = 0;
$datos = array();
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $iddept = utf8_encode($registro["id_departamento"]);
    $sql = "select * from contrato where id_departamento='$iddept'";
    $ejec_c = $conexion->query(utf8_encode($sql));
    $reg = $ejec_c->fetch_assoc();
    $tem = array(
        $iddept,
        utf8_encode($registro["calle"]),
        utf8_encode($registro["numero"]),
        utf8_encode($registro["edificio"]),
        utf8_encode($registro["lote"]),
        utf8_encode($registro["manzana"]),
        utf8_encode($registro["costo_departamento"]),
        utf8_encode($registro["posx"]),
        utf8_encode($registro["posy"]),
        utf8_encode($reg["id_proceso_adqusicion"]),
        utf8_encode($reg["estado_contrato"]));
    $datos[$i] = $tem;
    $i++;
}
 echo json_encode($datos);