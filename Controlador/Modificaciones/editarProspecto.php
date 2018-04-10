<?php

include '../conexion.php';
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
$medio = $_POST['medio'];
$ocupacion = $_POST['ocupacion'];
$estado_civil = $_POST["estado_civil"];
$referido = $_POST["referido"];
$nss = $_POST["nss"];
$curp_clave = $_POST["curp_clave"];
$curp_old = $_POST["curp_old"];
$rfc = $_POST["rfc"];
$rfc_old = $_POST["rfc"];
$mensaje;
$resp = false;
$editar = false;
if ($curp_clave == $curp_old) {
    if ($rfc == $rfc_old) {
        $editar = true;
    } else {
        $sql = "select * from prospeccion where rfc ='$rfc'";
        $ejecutar = $conexion->query($sql);
        $num_regs = $ejecutar->num_rows;
        if ($num_regs == 0) {
            $editar = true;
        } else {
            $mensaje = '<p class="text-danger"><strong>RFC ya registrada</strong>';
        }
    }
} else {

    $sql = "select * from prospeccion where clave_curp ='$curp_clave'";
    $ejecutar = $conexion->query($sql);
    $num_regs = $ejecutar->num_rows;
    if ($num_regs == 0) {
        if ($rfc == $rfc_old) {
            $editar = true;
        } else {
            $sql = "select * from prospeccion where rfc ='$rfc'";
            $ejecutar = $conexion->query($sql);
            $num_regs = $ejecutar->num_rows;
            if ($num_regs == 0) {
                $editar = true;
            } else {
                $mensaje = '<p class="text-danger"><strong>RFC ya registrada</strong>';
            }
        }
    } else {
        $mensaje = '<p class="text-danger"><strong>CURP ya registrada</strong>';
    }
}
if ($editar) {
    if (updateProspecto($nombre, $apellido, $apellidoM, $sexo, $fechaNac, $telefono, $calle, $numero, $codigo, $colonia, $curp, $medio, $ocupacion, $estado_civil, $referido, $nss, $curp_clave, $rfc, $conexion)) {
        $mensaje = '<p class="text-success"><strong>Prospecto ' . $curp . ' editado con exito</strong>';
        $resp = true;
    } else {
        $mensaje = '<p class="text-danger"><strong>Error en el servidor intente más tarde</strong>';
    }
}

function updateProspecto($nom, $ape1, $ape2, $sex, $fecha, $tele, $call, $num, $cod, $col, $clave, $med, $ocu, $esta, $refe, $cnss, $clave2, $rfce, $con) {
    $anio = substr($fecha, -4);
    $dia = substr($fecha, -7, 2);
    $mes = substr($fecha, -10, 2);
    $fechacast = $anio . "-" . $mes . "-" . $dia;
    $sql = "UPDATE prospeccion SET "
            . " nombres ='$nom',"
            . " apellido_paterno = '$ape1',"
            . " apellido_materno = '$ape2',"
            . " calle_direccion = '$call',"
            . " numero_direccion = '$num',"
            . " codigo_postal = '$cod',"
            . " colonia = '$col',"
            . " sexo = '$sex',"
            . " fecha_nacimiento ='$fechacast',"
            . " telefono ='$tele',"
            . " id_estado_civil = '$esta',"
            . "id_medio = '$med',"
            . "id_ocupacion = '$ocu',"
            . "id_referido = '$refe',"
            . "nss = '$cnss',"
            . "clave_curp ='$clave2',"
            . " rfc = '$rfce' where curp ='$clave' ";

    $ejecutar_consulta = $con->query(utf8_decode($sql));
    return $ejecutar_consulta;
}

$resultado = array($mensaje, $resp);
echo json_encode($resultado);
