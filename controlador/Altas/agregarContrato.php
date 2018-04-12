<?php

include '../conexion.php';
$iddepto     = $_POST["departamento"];
$data        = json_decode(stripslashes($_POST['data']));
$idpros      = $_POST["id"];
$anios       = $_POST["anios"];
$costoseguro = $_POST["costoseguro"];
$mensaje     = "";
$credito     = $_POST["credito"];
$resp        = false;
$sql0        = "select * from contrato where prospecto = '$idpros' and (estado_contrato = '1' or estado_contrato ='0')";
$ejecutar0   = $conexion->query(utf8_decode($sql0));
$num_regs    = $ejecutar0->num_rows;

if ($num_regs > 0) {
    $mensaje = "<p class='text-danger'><strong>Usuario con contrato en espera</strong><p>";
    $mensaje .= "<p class='text-danger'><strong>No puedes generar dos contratos a la vez</strong><p>";
    $mensaje .= "<p class='text-danger'><strong>Contacta a tu jefe de ventas</strong><p>";
} else {
    if (!empty($data)) {
        $sql               = "select id_seguro from seguros";
        $ejecutar_consulta = $conexion->query(utf8_decode($sql));
        $id                = 0;
        while ($registro = $ejecutar_consulta->fetch_assoc()) {
            $id = utf8_encode($registro["id_seguro"]);
        }
        $idventa = $id + 1;
        $sql2    = "INSERT INTO seguros "
            . "(id_seguro,fecha, anios,costo_total) VALUES "
            . "('$idventa', now(),'$anios','$costoseguro')";
        $mensaje            = $sql2;
        $ejecutar_consulta2 = $conexion->query(utf8_decode($sql2));
        if ($ejecutar_consulta2) {
            foreach ($data as $d) {
                $sql3 = "INSERT INTO detalle_seguros "
                    . "(seguro, id_cobertura) VALUES "
                    . "('$idventa', '$d')";
                $ejecutar_consulta3 = $conexion->query(utf8_decode($sql3));
                if ($ejecutar_consulta3) {
                    $mensaje = "<p class='text-success'><strong>Contrato registrado con éxito</strong><p>";
                } else {
                    $mensaje = "<p class='text-danger'><strong>Error en el servidor intente más tarde</strong><p>";
                }
            }
            $sql4 = "INSERT INTO contrato "
                . "(id_seguro, prospecto , id_departamento, id_credito, id_proceso_adqusicion,estado_contrato,fecha_contrato) VALUES "
                . "('$idventa', '$idpros','$iddepto','$credito','1','0',now())";
            $ejecutar_consulta4 = $conexion->query(utf8_decode($sql4));
            if ($ejecutar_consulta4) {
                $resp    = true;
                $mensaje = "<p class='text-success'><strong>Contrato registrado con éxito</strong><p>";
            } else {
                $mensaje = "<p class='text-danger'><strong>Error en el servidor intente más tarde</strong><p>";
            }
        } else {
            $mensaje = "<p class='text-danger'><strong>Error en el servidor intente más tarde</strong><p>";
        }
    } else {
        $sql               = "select id_seguro from seguros";
        $ejecutar_consulta = $conexion->query(utf8_decode($sql));
        $id                = 0;
        while ($registro = $ejecutar_consulta->fetch_assoc()) {
            $id = utf8_encode($registro["id_seguro"]);
        }
        $idventa = $id + 1;
        $sql4    = "INSERT INTO contrato "
            . "( prospecto ,id_departamento,id_credito,id_proceso_adqusicion,estado_contrato,fecha_contrato) VALUES "
            . "('$idpros','$iddepto','$credito','1','0',now())";
        $ejecutar_consulta4 = $conexion->query(utf8_decode($sql4));
        if ($ejecutar_consulta4) {
            $resp    = true;
            $mensaje = "<p class='text-success'><strong>Contrato registrado con éxito</strong><p>";
        } else {
            $mensaje = "<p class='text-danger'><strong>Error en el servidor intente más tarde</strong><p>";
        }
    }
}
echo json_encode(array($mensaje, $resp));
/*
 */

/*

id_contrato
id_seguro
prospecto
id_departamento
id_credito
id_proceso_adqusicion
 *
 *
id_seguro
fecha
anios
costo_total
 *
 *
id_detalle_seguro
seguro
id_cobertura

 */
//echo $id;
