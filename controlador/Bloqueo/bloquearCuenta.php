<?php

$usuario = $_POST["valor"];
$estado = $_POST["tipo"];

include("../conexion.php");
$sql0 = "select id_perfil from usuario where nom_usu ='$usuario'";
$ejec_rol = $conexion->query(utf8_decode($sql0));
$registro = $ejec_rol->fetch_assoc();
$rol = utf8_encode($registro["id_perfil"]);

if ($rol == "3") {
    $sql1 = "select nom_usu from usuario where id_perfil ='3' and estatus ='1' ";
    $ejec_count = $conexion->query(utf8_decode($sql1));
    $num_regs = $ejec_count->num_rows;
    if ($estado == 0) {
        if ($num_regs >= 2) {
            echo "Nuevo perfil JEFE DE VENTAS más de 2 ADMINISTRADORES activos";
            $consulta = "UPDATE usuario SET estatus = '1' , id_perfil ='2' WHERE nom_usu = '$usuario' ";
            $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
        } else {
            if ($estado == 1) {
                $consulta = "UPDATE usuario SET estatus = '0' WHERE nom_usu = '$usuario' ";
            } else {
                $consulta = "UPDATE usuario SET estatus = '1' WHERE nom_usu = '$usuario' ";
            }
            $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
        }
    } else {
        if ($estado == 1) {
            $consulta = "UPDATE usuario SET estatus = '0' WHERE nom_usu = '$usuario' ";
        } else {
            $consulta = "UPDATE usuario SET estatus = '1' WHERE nom_usu = '$usuario' ";
        }
        $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    }
} else {
    if ($estado == 1) {
        $consulta = "UPDATE usuario SET estatus = '0' WHERE nom_usu = '$usuario' ";
    } else {
        $consulta = "UPDATE usuario SET estatus = '1' WHERE nom_usu = '$usuario' ";
    }
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
}




