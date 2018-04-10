<?php


$id = $_POST["id"];

function getDepartmentos($frac) {
    include "conexion.php";
    $consulta = "select id_departamento FROM departamentos where id_fraccionamiento ='$frac'";    
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    $i = 0;
    $reg = array();
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $depto= utf8_encode($registro["id_departamento"]);
        $consulta2 = "SELECT id_proceso_adquisicion from contrato where id_departamento= '$depto'";
        $ejecutar_consulta2 = $conexion->query(utf8_decode($consulta2));
        $datosTem = $ejecutar_consulta2->fetch_assoc();
        $tem = array($depto,utf8_encode($datosTem["id_proceso_adquisicion"]));        
        $reg[$i] = $tem;
        $i++;
    }
    $conexion->close();
    return $reg;
}

echo json_encode(getDepartmentos($id));

