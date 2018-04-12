<?php

$nombre = $_POST["nombre"];
$apellido = $_POST['apellido_pat'];
$apellidoM = $_POST['apellido_mat'];
$sexo = $_POST['sexo'];
$fechaNac = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$codigo = $_POST['cp'];
$colonia = $_POST['colonia'];
$curp = $_POST['curp'];
$usuario = $_POST['usuario'];
$medio = $_POST['medio'];
$ocupacion = $_POST['ocupacion'];
$estado_civil = $_POST["estado_civil"];
$referido = $_POST["referido"];
$nss = $_POST["nss"];
$curp_clave = $_POST["curp_clave"];
$rfc = $_POST["rfc"];
include "../conexion.php";
$consulta = "select * from prospeccion where curp = '$curp'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje;
$anio = substr($fechaNac, -4);
$dia = substr($fechaNac, -7, 2);
$mes = substr($fechaNac, -10, 2);
$fechacast = $anio . "-" . $mes . "-" . $dia;
$res = false;
$agregarReg = false;
if ($num_regs == 0) {
    if ($curp_clave == "") {
        if ($rfc == "") {
            $agregarReg = true;
        } else {
            $sql = "select * from rfc where rfc ='$rfc'";
            $ejecutar = $conexion->query(utf8_decode($sql));
            $num_regs = $ejecutar->num_rows;
            if ($num_regs > 0) {
                $mensaje = '<p  class="text-danger" ><strong>'
                        . 'Prospecto con RFC ' . $rfc . ' ya esta registrado</strong></p>';
            } else {
                $agregarReg = true;
            }
        }
    } else {
        $sql = "select * from prospeccion where clave_curp ='$curp_clave'";
        $ejecutar = $conexion->query(utf8_decode($sql));
        $num_regs = $ejecutar->num_rows;
        if ($num_regs > 0) {
            $mensaje = '<p  class="text-danger" ><strong>'
                    . 'Prospecto con CURP ' . $curp_clave . ' ya esta registrado</strong></p>';
        } else {
            if ($rfc == "") {
                $agregarReg = true;
            } else {
                $sql = "select * from prospeccion where rfc ='$rfc'";
                $ejecutar = $conexion->query(utf8_decode($sql));
                $num_regs = $ejecutar->num_rows;
                if ($num_regs > 0) {
                    $mensaje = '<p  class="text-danger" ><strong>'
                            . 'Prospecto con RFC ' . $rfc . ' ya esta registrado</strong></p>';
                } else {
                    $agregarReg = true;
                }
            }
        }
    }
} else {
    //usuario ya esta en uso
    $mensaje = '<p  class="text-danger" ><strong>El prospecto con Código '
            . $curp . ' ya se encuentra registrado </strong></p>';
}
if ($agregarReg) {
    $consulta = "INSERT INTO prospeccion "
            . "(curp,"
            . " nombres,"
            . " apellido_paterno,"
            . " apellido_materno,"
            . " calle_direccion,"
            . " numero_direccion,"
            . " codigo_postal,"
            . " colonia,"
            . " sexo,"
            . " fecha_nacimiento,"
            . " telefono,"
            . " id_estado_civil,"
            . "id_medio,"
            . "id_ocupacion,"
            . "id_referido,"
            . "nss,"
            . "clave_curp,"
            . "rfc) VALUES "
            . "('$curp', '$nombre', '$apellido', '$apellidoM', "
            . "'$calle', '$numero', '$codigo', '$colonia', '$sexo',"
            . " '$fechacast', '$telefono','$estado_civil','$medio',"
            . "'$ocupacion','$referido','$nss','$curp_clave','$rfc')";
    $consulta2 = "INSERT INTO detalle_prospeccion "
            . "(nom_usu,"
            . " curp,"
            . " fecha_inicio) VALUES "
            . "('$usuario', '$curp', now())";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    $ejecutar_consulta2 = $conexion->query(utf8_decode($consulta2));
    if ($ejecutar_consulta & $ejecutar_consulta2) {
        $res = true;
        $mensaje = '<p  class="text-success" ><strong>El prospecto con Código '
                . $curp . ' se ha registrado con exito </strong></p>';
    } else {

        $mensaje = '<p  class="text-danger" ><strong>'
                . 'Error en el servidor intenete más tarde</strong></p>';
    }
}

$resultado = array($mensaje, $res);
echo json_encode($resultado);
