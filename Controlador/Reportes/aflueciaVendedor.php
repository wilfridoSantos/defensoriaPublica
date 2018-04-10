<?php

$fecha1 = $_POST["fechai"];
$fecha2 = $_POST["fechaf"];
$id = $_POST["vendedor"];
include '../conexion.php';
$anio = substr($fecha1, -4);
$dia = substr($fecha1, -7, 2);
$mes = substr($fecha1, -10, 2);
$fechacast1 = $anio . "-" . $mes . "-" . $dia;
$anio0 = substr($fecha2, -4);
$dia0 = substr($fecha2, -7, 2);
$mes0 = substr($fecha2, -10, 2);
$fechacast2 = $anio0 . "-" . $mes0 . "-" . $dia0;
$medios = $_POST["medio"];
$referido = $_POST["referido"];
$ocupaciones = $_POST["ocupacion"];
$medios_txt = $_POST["medio_txt"];
$referido_txt = $_POST["referido_txt"];
$ocupaciones_txt = $_POST["ocupacion_txt"];
$fracc = $_POST["fracc"];
$fracc_txt = $_POST["fracc_txt"];
//reporte general

if ($fecha1 == "" && $fecha2 == "" && $id == "0" && $medios == "false" && $ocupaciones == "false" && $referido == "false" && $fracc == "false") {
    $sql = 'SELECT * from usuario where estatus =1 and id_perfil =1';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("ASESOR", "PROSPECCIÓN TOTAL");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $ids = utf8_encode($registro["nom_usu"]);
        $sql1 = "SELECT COUNT(*) as total from prospeccion p INNER JOIN detalle_prospeccion  d on
                p.curp = d.curp  where d.nom_usu ='$ids'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        $tem = array(
            utf8_encode($registro["nombres_usu"]) . ' '
            . utf8_encode($registro["ape_paterno_usu"]),
            (int) utf8_encode($reg["total"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}

//todos los asesores con medios
if ($fecha1 == "" && $fecha2 == "" && $id == "0" && $medios == "true" && $ocupaciones == "false" && $referido == "false" && $fracc == "false") {
    $sql = 'SELECT * from medios where estatus =1';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("MEDIOS", "TOTAL PROSPECTOS");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $id = utf8_encode($registro["id_medio"]);
        $sql1 = " SELECT COUNT(id_medio) as medios from prospeccion where id_medio ='$id'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        $tem = array(
            utf8_encode($registro["medio"]),
            (int) utf8_encode($reg["medios"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == "0" && $medios == "false" && $ocupaciones == "true" && $referido == "false" && $fracc == "false") {
    $sql = 'SELECT * from ocupaciones where estatus =1';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("OCUPACIONES", "TOTAL PROSPECTOS");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $id = utf8_encode($registro["id_ocupacion"]);
        $sql1 = " SELECT COUNT(id_ocupacion) as ocupaciones from prospeccion where id_ocupacion ='$id'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        $tem = array(
            utf8_encode($registro["ocupacion"]),
            (int) utf8_encode($reg["ocupaciones"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == "0" && $medios == "false" && $ocupaciones == "false" && $referido == "true" && $fracc == "false") {
    $sql = 'SELECT * from referidos where estatus =1';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("REFERIDO", "TOTAL PROSPECTOS");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $id = utf8_encode($registro["id_referido"]);
        $sql1 = " SELECT COUNT(id_referido) as referidos from prospeccion where id_referido ='$id'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        if ($id == "0") {
            $tem = array("SIN REFERIDO", (int) utf8_encode($reg["referidos"]));
        } else {
            $tem = array(
                utf8_encode($registro["nombre_referido"]) . ' ' . utf8_encode($registro["apellido_paterno_referido"]),
                (int) utf8_encode($reg["referidos"]));
        }

        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == "0" && $medios == "false" && $ocupaciones == "false" && $referido == "false" && $fracc == "true") {
    $sql = 'SELECT * from fraccionamientos';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("FRACCIONAMIENTO", "TOTAL VENDIDOS");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $ids = utf8_encode($registro["id_fraccionamiento"]);
        $sql1 = "SELECT COUNT( id_fraccionamiento) as ventas from contrato c "
                . "INNER JOIN departamentos d on"
                . " c.id_departamento = d.id_departamento"
                . " where d.id_fraccionamiento='$ids'  AND c.estado_contrato='2'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        $tem = array(
            utf8_encode($registro["nombre_fraccionamiento"]),
            (int) utf8_encode($reg["ventas"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id != "0" && $medios == "false" && $ocupaciones == "false" && $referido == "false" && $fracc == "false") {
    $sql = "select * from prospeccion p
INNER JOIN detalle_prospeccion d on p.curp = d.curp
INNER JOIN usuario u on d.nom_usu = u.nom_usu
where d.nom_usu = '$id';";
    /* $sql = 'SELECT * from usuario where estatus =1 and id_perfil =1';
      $ejecutar_consulta = $conexion->query($sql);
      $datos = array();
      $datos[0] = array("ASESOR", "PROSPECCIÓN TOTAL");
      $i = 1;
      while ($registro = $ejecutar_consulta->fetch_assoc()) {
      $ids = utf8_encode($registro["nom_usu"]);
      $sql1 = "SELECT COUNT(*) as total from prospeccion p INNER JOIN detalle_prospeccion  d on
      p.curp = d.curp  where d.nom_usu ='$ids'";
      $ejecutar = $conexion->query($sql1);
      $reg = $ejecutar->fetch_assoc();
      $tem = array(
      utf8_encode($registro["nombres_usu"]) . ' '
      . utf8_encode($registro["ape_paterno_usu"]),
      (int) utf8_encode($reg["total"]));
      $datos[$i] = $tem;
      $i++;
      }
      echo json_encode($datos); */
}
/*
if ($fecha1 == "" && $fecha2 == "" && $id != "0") {
    $sql0 = "SELECT * from departamentos where id_fraccionamiento='$id'";
    $ejecutar_consulta0 = $conexion->query($sql0);
    $reg = $ejecutar_consulta0->fetch_assoc();
    $manzana = utf8_encode($reg["manzana"]);
    $lote = utf8_encode($reg["lote"]);
    $datos = array();
    $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id'";
    $i = 1;
    if ($lote == 0) {
        $datos[0] = array("MANZANA", "TOTAL VENDIDOS");
        $sql2 = "select * from departamentos where id_fraccionamiento='$id' group by manzana";
        $ejecutar_consulta0 = $conexion->query($sql2);
        while ($registro = $ejecutar_consulta0->fetch_assoc()) {
            $mzn = $registro["manzana"];
            $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id' and manzana= '$mzn'";
            $ejecutar_consulta3 = $conexion->query($sql1);
            $tem = $ejecutar_consulta3->fetch_assoc();
            $datos[$i] = array("Manzana " . $mzn, (int) $tem["total"]);
            $i++;
        }
    } else {
        $datos[0] = array("LOTE", "TOTAL VENDIDOS");
        $sql2 = "select * from departamentos where id_fraccionamiento='$id' group by lote";
        $ejecutar_consulta0 = $conexion->query($sql2);
        while ($registro = $ejecutar_consulta0->fetch_assoc()) {
            $mzn = $registro["lote"];
            $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id' and lote= '$mzn'";
            $ejecutar_consulta3 = $conexion->query($sql1);
            $tem = $ejecutar_consulta3->fetch_assoc();
            $datos[$i] = array("Lote " . $mzn, (int) $tem["total"]);
            $i++;
        }
    }
    echo json_encode($datos);
}

if ($fecha1 != "" && $fecha2 != "" && $id == "0") {
    $sql = 'SELECT * from fraccionamientos';
    $ejecutar_consulta = $conexion->query($sql);
    $datos = array();
    $datos[0] = array("FRACCIONAMIENTO", "TOTAL VENDIDOS");
    $i = 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $ids = utf8_encode($registro["id_fraccionamiento"]);
        $sql1 = "SELECT COUNT( id_fraccionamiento) as ventas from contrato c "
                . "INNER JOIN departamentos d on"
                . " c.id_departamento = d.id_departamento"
                . " where d.id_fraccionamiento='$ids'  AND c.estado_contrato='2'"
                . " and c.fecha_contrato>='$fechacast1' and c.fecha_contrato<='$fechacast2'";
        $ejecutar = $conexion->query($sql1);
        $reg = $ejecutar->fetch_assoc();
        $tem = array(
            utf8_encode($registro["nombre_fraccionamiento"]),
            (int) utf8_encode($reg["ventas"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}
if ($fecha1 != "" && $fecha2 != "" && $id != "0") {
    $sql0 = "SELECT * from departamentos where id_fraccionamiento='$id'";
    $ejecutar_consulta0 = $conexion->query($sql0);
    $reg = $ejecutar_consulta0->fetch_assoc();
    $manzana = utf8_encode($reg["manzana"]);
    $lote = utf8_encode($reg["lote"]);
    $datos = array();
    $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id'";
    $i = 1;
    if ($lote == 0) {
        $datos[0] = array("MANZANA", "TOTAL VENDIDOS");
        $sql2 = "select * from departamentos where id_fraccionamiento='$id' group by manzana";
        $ejecutar_consulta0 = $conexion->query($sql2);
        while ($registro = $ejecutar_consulta0->fetch_assoc()) {
            $mzn = $registro["manzana"];
            $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id' and manzana= '$mzn' "
                    . "and c.fecha_contrato>='$fechacast1' and c.fecha_contrato<='$fechacast2'";
            $ejecutar_consulta3 = $conexion->query($sql1);
            $tem = $ejecutar_consulta3->fetch_assoc();
            $datos[$i] = array("Manzana " . $mzn, (int) $tem["total"]);
            $i++;
        }
    } else {
        $datos[0] = array("LOTE", "TOTAL VENDIDOS");
        $sql2 = "select * from departamentos where id_fraccionamiento='$id' group by lote";
        $ejecutar_consulta0 = $conexion->query($sql2);
        while ($registro = $ejecutar_consulta0->fetch_assoc()) {
            $mzn = $registro["lote"];
            $sql1 = "SELECT count(*) as total from contrato c
            INNER JOIN departamentos d on d.id_departamento = c.id_departamento
            inner join fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
            where c.estado_contrato =2 and f.id_fraccionamiento ='$id' and lote= '$mzn' "
                    . "and c.fecha_contrato>='$fechacast1' and c.fecha_contrato<='$fechacast2'";
            $ejecutar_consulta3 = $conexion->query($sql1);
            $tem = $ejecutar_consulta3->fetch_assoc();
            $datos[$i] = array("Lote" . $mzn, (int) $tem["total"]);
            $i++;
        }
    }
    echo json_encode($datos);
}*/

