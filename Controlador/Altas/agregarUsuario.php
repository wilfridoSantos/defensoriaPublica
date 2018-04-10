<?php

include '../encriptador.php';
$usuario = $_POST["usuario"];
$nombre = $_POST['nombre'];
$ape_pat = $_POST['ape_pat'];
$ape_mat = $_POST["ape_mat"];
$foto = $_POST["foto"];
$password = encriptar($_POST["password"]);
$cargo = $_POST["cargo"];
$sucursal = $_POST["sucursal"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$calle = $_POST["calle"];
$numero_direccion = $_POST["numero"];
$cp = $_POST["cp"];
$colonia = $_POST["colonia"];
include "../conexion.php";
$mensaje = "";
$res = false;
//validamos que no exista otro usuario con ese nombre
$sql = "select * from usuario WHERE nom_usu='$usuario' or "
        . "nombres_usu ='$nombre' and ape_paterno_usu ='$ape_pat' "
        . "and ape_materno_usu ='$ape_mat'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
    //validamos que no este en uso ese email
    $sql = "select * from usuario where correo_usu = '$email'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $num_regs = $ejecutar_consulta->num_rows;
    if ($num_regs == 0) {
        // solo 2 administradores
        if ($cargo == "3") {
            $sql = "select id_perfil from usuario where id_perfil = '$cargo' and estatus='1'";
            $ejecutar_consulta = $conexion->query(utf8_decode($sql));
            $num_regs = $ejecutar_consulta->num_rows;
            if ($num_regs < 2) {
                $sql = "INSERT INTO usuario "
                        . "(nom_usu, nombres_usu, ape_paterno_usu, "
                        . "ape_materno_usu, calle_domicilio_usu,"
                        . " numero_domicilio_usu, colonia_domicilio_usu,"
                        . " cp_domicilio_usu, telefono_usu, correo_usu, "
                        . "password, id_perfil, id_sucursal,foto,estatus)"
                        . " VALUES "
                        . "('$usuario', '$nombre', '$ape_pat', '$ape_mat',"
                        . " '$calle', '$numero_direccion', '$colonia',"
                        . " '$cp', '$telefono', '$email', '$password',"
                        . " '$cargo', '$sucursal','$foto',1)";
                $ejecutar_consulta = $conexion->query(utf8_decode($sql));
                if ($ejecutar_consulta) {
                    $res = true;
                    $mensaje = '<p  class="text-success" ><strong>'
                            . 'se ha registrado el usuario ' . $usuario
                            . ' con EXITO</strong></p>';
                } else {
                    $mensaje = '<p  class="text-danger" ><strong>'
                            . 'Error en el servidor intente más tarde'
                            . '</strong></p>';
                }
            } else {
                $mensaje = '<p  class="text-danger" ><strong>'
                        . 'No puede haber más de 2 ADMINISTRADORES'
                        . '</strong></p>';
            }
        } else {
            $sql = "INSERT INTO usuario "
                    . "(nom_usu, nombres_usu, ape_paterno_usu, "
                    . "ape_materno_usu, calle_domicilio_usu, "
                    . "numero_domicilio_usu, colonia_domicilio_usu,"
                    . " cp_domicilio_usu, telefono_usu,"
                    . " correo_usu, password, id_perfil, "
                    . "id_sucursal,foto,estatus) VALUES "
                    . "('$usuario', '$nombre', '$ape_pat', '$ape_mat', "
                    . "'$calle', '$numero_direccion', '$colonia', "
                    . "'$cp', '$telefono', '$email', '$password',"
                    . " '$cargo', '$sucursal','$foto',1)";
            $ejecutar_consulta = $conexion->query(utf8_decode($sql));
            if ($ejecutar_consulta) {
                $res = true;
                $mensaje = '<p  class="text-success" ><strong>'
                        . 'se ha registrado el usuario ' . $usuario
                        . ' con EXITO</strong></p>';
            } else {
                $mensaje = '<p  class="text-danger" ><strong>'
                        . 'Error en el servidor intente más tarde'
                        . '</strong></p>';
            }
        }
    } else {
        $mensaje = '<p  class="text-danger" ><strong>El correo ' . $email
                . ' ya esta es uso</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Ya se encuentra registrado ese usuario</strong></p>';
}
$resultado = array($mensaje, $res);
echo json_encode($resultado);

