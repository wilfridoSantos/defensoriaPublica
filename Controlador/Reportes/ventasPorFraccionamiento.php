<?php

$fecha1 = $_POST["fechai"];
$fecha2 = $_POST["fechaf"];
$id = $_POST["fracc"];
include '../conexion.php';
$anio = substr($fecha1, -4);
$dia = substr($fecha1, -7, 2);
$mes = substr($fecha1, -10, 2);
$fechacast1 = $anio . "-" . $mes . "-" . $dia;
$anio0 = substr($fecha2, -4);
$dia0 = substr($fecha2, -7, 2);
$mes0 = substr($fecha2, -10, 2);
$fechacast2 = $anio0 . "-" . $mes0 . "-" . $dia0;
if ($fecha1 == "" && $fecha2 == "" && $id == 0) {
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
            $datos[$i] = array("Manzana ". $mzn,(int) $tem["total"]);
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
            $datos[$i] = array("Lote ".$mzn,(int) $tem["total"]);
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
            $datos[$i] = array("Manzana ".$mzn, (int)$tem["total"]);
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
            $datos[$i] = array("Lote". $mzn, (int)$tem["total"]);
            $i++;
        }
    }
    echo json_encode($datos);
}
        
    

