<?php

function conectarse()
{
    $servidor = "localhost";
    $usuario  = "u858616915_root";
    $password = "defensoria";
    $bd       = "u858616915_defen";

    $conectar = new mysqli($servidor, $usuario, $password, $bd);
    return $conectar;
}
function consulta($sql, $conexion){
   // $resultado = mysqli_query($conexion, $sql)or die(mysqli_error($conexion));
    $resultado = $conexion->query($sql);
    return $resultado;
 }
 
$conexion = conectarse();
