<?php

include '../conexion.php';
include '../encriptador.php';
$usuario = $_POST["usuario"];
$nombre = $_POST['nombre'];
$ape_pat = $_POST['ape_pat'];
$ape_mat = $_POST["ape_mat"];
$password = encriptar($_POST["password"]);
$cargo = $_POST["cargo"];
$sucursal = $_POST["sucursal"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$calle = $_POST["calle"];
$numero_direccion = $_POST["numero"];
$cp = $_POST["cp"];
$colonia = $_POST["colonia"];
$correo_old = $_POST["email_old"];
$cargo_old = $_POST["cargo_old"];
$mensaje;
$resp = false;
if ($cargo_old != $cargo) {
    $num_regs = 0;
    if ($cargo == "3") {
        $sql = "select id_perfil from usuario where id_perfil = '$cargo' and estatus='1'";
        $ejecutar_consulta = $conexion->query(utf8_decode($sql));
        $num_regs = $ejecutar_consulta->num_rows;
    }
    if ($num_regs >= 2) {
        $mensaje = '<p  class="text-danger" ><strong>'
                . 'No puede haber más de 2 ADMINISTRADORES</strong></p>';
    } else {
        if ($email != $correo_old) {
            if (validarCorreo($email, $conexion, $nombre, $ape_pat, $ape_mat, $calle, $numero_direccion, $colonia, $cp, $telefono, $password, $cargo, $sucursal, $usuario)) {
                $resp = true;
                $mensaje = '<p class="text-success"><strong>Usuario ' . $usuario . ' editado con exito</strong>';
            } else {
                $mensaje = '<p class="text-danger"><strong>El correo ' . $email . ' ya esta en uso</strong>';
            }
        } else {
            if (update($email, $conexion, $nombre, $ape_pat, $ape_mat, $calle, $numero_direccion, $colonia, $cp, $telefono, $password, $cargo, $sucursal, $usuario)) {
                $resp = true;
                $mensaje = '<p class="text-success"><strong>Usuario ' . $usuario . ' editado con exito</strong>';
            } else {
                $mensaje = '<p class="text-danger"><strong>Error en el servidor intente más tarde</strong>';
            }
        }
    }
} else {
    if ($email != $correo_old) {
        if (validarCorreo($email, $conexion, $nombre, $ape_pat, $ape_mat, $calle, $numero_direccion, $colonia, $cp, $telefono, $password, $cargo, $sucursal, $usuario)) {
            $resp = true;
            $mensaje = '<p class="text-success"><strong>Usuario ' . $usuario . ' editado con exito</strong>';
        } else {
            $mensaje = '<p class="text-danger"><strong>El correo ' . $email . ' ya esta en uso</strong>';
        }
    } else {
        if (update($email, $conexion, $nombre, $ape_pat, $ape_mat, $calle, $numero_direccion, $colonia, $cp, $telefono, $password, $cargo, $sucursal, $usuario)) {
            $resp = true;
            $mensaje = '<p class="text-success"><strong>Usuario ' . $usuario . ' editado con exito</strong>';
        } else {
            $mensaje = '<p class="text-danger"><strong>Error en el servidor intente más tarde</strong>';
        }
    }
}

function validarCorreo($c, $cone, $nom, $ape_p, $ape_m, $call, $numero, $col, $codigo, $tel, $pass, $car, $suc, $usu) {
    $sql = "select correo_usu from usuario where correo_usu = '$c'";
    $ejecutar_consulta = $cone->query(utf8_decode($sql));
    $num_regs = $ejecutar_consulta->num_rows;
    $num_regs;
    $r = false;
    if ($num_regs > 0) {

    } else {
        $sql = "UPDATE usuario"
                . " SET  nombres_usu = '$nom' ,"
                . " ape_paterno_usu = '$ape_p' ,"
                . " ape_materno_usu = '$ape_m' ,"
                . " calle_domicilio_usu ='$call', "
                . " numero_domicilio_usu='$numero',"
                . " colonia_domicilio_usu='$col',"
                . " cp_domicilio_usu = '$codigo',"
                . " correo_usu = '$c',"
                . " telefono_usu ='$tel' ,"
                . " password ='$pass', "
                . " id_perfil ='$car', "
                . " id_sucursal='$suc'"
                . " WHERE nom_usu = '$usu'";
        $ejecutar_consulta = $cone->query(utf8_decode($sql));
        if ($ejecutar_consulta) {
            $r = true;
        }
    }
    return $r;
}

function update($c, $cone, $nom, $ape_p, $ape_m, $call, $numero, $col, $codigo, $tel, $pass, $car, $suc, $usu) {
    $r = false;
    $sql = "UPDATE usuario"
            . " SET  nombres_usu = '$nom' ,"
            . " ape_paterno_usu = '$ape_p' ,"
            . " ape_materno_usu = '$ape_m' ,"
            . " calle_domicilio_usu ='$call', "
            . " numero_domicilio_usu='$numero',"
            . " colonia_domicilio_usu='$col',"
            . " cp_domicilio_usu = '$codigo',"
            . " correo_usu = '$c',"
            . " telefono_usu ='$tel' ,"
            . " password ='$pass', "
            . " id_perfil ='$car', "
            . " id_sucursal='$suc'"
            . " WHERE nom_usu = '$usu'";
    $ejecutar_consulta = $cone->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        $r = true;
    }
    return $r;
}

$resultado = array($mensaje, $resp);
echo json_encode($resultado);
