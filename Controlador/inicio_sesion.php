<?php

include "conexion.php";
//include "encriptador.php";
$usuario = $_POST["usuario_txt"];
$password =$_POST["password_txt"];//encriptar();

$sql = "SELECT * FROM usuario_sistema WHERE username='$usuario'";
$ejecutar_consulta = $conexion->query($sql);
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
    echo '<p class="text-danger"><strong>No existe ninguna cuenta vinculada a ' . $usuario . '</strong></p>';
} else {
    $sql = "SELECT * FROM usuario_sistema WHERE (username = '$usuario') and (password = '$password')";
    $sqlRol = "select id_cargo from personal as p inner join usuario_sistema as u on 
    p.id_personal = u.id_personal where u.username = '$usuario'";
    $ejecutar_consulta = $conexion->query($sqlRol);
    $temp = $ejecutar_consulta->mysql_fetch_assoc();
    $id_cargo = $temp["id_cargo"];

    //printf($id_cargo + "hooola");
    $ejecutar_consulta = $conexion->query($sql);
    $num_regs = $ejecutar_consulta->num_rows;
    if ($num_regs == 0) {
        echo '<p class="text-danger"><strong>Contraseña incorrecta</strong></p>';
    } else {
        $registro = $ejecutar_consulta->fetch_assoc();
        $estatus = $registro["estado"];
        $usu = $registro["username"];
        if ($estatus == 1) {//verifica estado primero si esta activo
           session_start();//si esta activo inicia session
            $_SESSION["autentificado"] = true;//queda autenticado
            $_SESSION["usuario"] = $usu;
            $_SESSION["rol"] = $id_cargo;
            if($_SESSION["rol"] == "1"){
                echo'<script language="javascript">window.location="Vistas/Administrador/index.php"</script>';
            }
            if($_SESSION["rol"] == "2"){

                echo'<script language="javascript">window.location="Vistas/Coordinador/index.php"</script>';
            }
            
            if($_SESSION["rol"] == "3"){
                echo'<script language="javascript">window.location="Vistas/Defensor/index.php"</script>';
            }
            //echo'<script language="javascript">window.location="Vistas/Administrador/index.php"</script>';
        } else {
            echo '<p class="text-danger"><strong>Cuenta inactiva contacta al administrador</strong></p>';
        }
    }
}

    