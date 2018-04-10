<?php
$valor = $_POST["valor"];
include("../../php/conexion.php");
$sql = "SELECT * FROM departamentos where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_encode($sql));
$i=0;
$datos=array();
while ($registro = $ejecutar_consulta->fetch_assoc()){
    $tem = array(
        utf8_encode($registro["id_departamento"]),
        utf8_encode($registro["calle"]),
        utf8_encode($registro["numero"]),
        utf8_encode($registro["edificio"]),
        utf8_encode($registro["lote"]),
        utf8_encode($registro["manzana"]),
        utf8_encode($registro["costo_departamento"]),
        utf8_encode($registro["posx"]),
        utf8_encode($registro["posy"]));
   $datos[$i]=$tem;
   $i++;
}
 echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

