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
if ($fecha1 == "" && $fecha2 == "" && $id == 0 && $medios == "false" && $ocupaciones == "false" && $referido == "false" && $fracc == "false") {
    $sql = "select * from  prospeccion p
INNER JOIN detalle_prospeccion d on p.curp = d.curp
INNER JOIN estado_civil est on est.id_estado_civil = p.id_estado_civil
INNER JOIN medios m on m.id_medio = p.id_medio
INNER JOIN referidos r on r.id_referido = p.id_referido
INNER JOIN  ocupaciones o  on o.id_ocupacion = p.id_ocupacion";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $datos = array();
    $i = 0;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $tem = array("#" => $i + 1,
            "codigo cliente" => utf8_encode($registro["curp"]),
            "nombre" => utf8_encode($registro["nombres"]),
            "primer apellido" => utf8_encode($registro["apellido_paterno"]),
            "segundo apellido" => utf8_encode($registro["apellido_materno"]),
            "nss" => utf8_encode($registro["nss"]),
            "curp" => utf8_encode($registro["clave_curp"]),
            "teléfono" => utf8_encode($registro["telefono"]),
            "medio" => utf8_encode($registro["medio"]),
            "referido" => utf8_encode($registro["nombre_referido"]) . ' '
            . utf8_encode($registro["apellido_paterno_referido"]) . ' '
            . utf8_encode($registro["apellido_materno_referido"]),
            "estado civil" => utf8_encode($registro["estado_civil"]),
            "calle" => utf8_encode($registro["calle_direccion"]),
            "número" => utf8_encode($registro["numero_direccion"]),
            "código postal" => utf8_encode($registro["codigo_postal"]),
            "colonia" => utf8_encode($registro["colonia"]),
            "sexo" => utf8_encode($registro["sexo"]),
            "nacimiento " => utf8_encode($registro["fecha_nacimiento"]),
            "afiliacion" => utf8_encode($registro["fecha_inicio"]),
            "ocupacion" => utf8_encode($registro["ocupacion"]),
            "asesor" => utf8_encode($registro["nom_usu"]));
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
}

//todos los asesores con medios
if ($fecha1 == "" && $fecha2 == "" && $id == 0 && $medios == "true" && $ocupaciones == "false" && $referido == "false" && $fracc == "false") {
    //se obtienes todos los vendedores
    $sql = "SELECT nom_usu, nombres_usu, ape_paterno_usu ,ape_materno_usu from usuario where id_perfil ='1' and estatus ='1'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $datos = array(); //arreglo que tendra los datos finales
    $i = 0;
    $j = 0;
    $sql0 = "select * from medios where estatus='1' "; //lista de todos los medios
    $ejecutar_consulta0 = $conexion->query(utf8_decode($sql0));
    $medios_ = array(); //almacenaran los medios
    $idmedios_ = array(); //almacenaran los ids
    while ($registro = $ejecutar_consulta0->fetch_assoc()) {
        $medios_[$i] = utf8_encode($registro["medio"]);
        $idmedios_ [$i] = utf8_encode($registro["id_medio"]);
        $i++;
    }
    //se eejcuta el ciclo para los vendedores
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $codigovendedor = utf8_encode($registro["nom_usu"]);
        $nombre = utf8_encode($registro["nombres_usu"]);
        $apellidop = utf8_encode($registro["ape_paterno_usu"]);
        $apellidom = utf8_encode($registro["ape_materno_usu"]);
        $tem = array("#" => $j + 1,
            "CÓDIGO DEL VENDEDOR" => $codigovendedor,
            "NOMBRE" => $nombre,
            "PRIMER APELLIDO" => $apellidop,
            "SEGUNDO APELLIDO" => $apellidom
        );
        $total = 0;
        for ($index = 0; $index < count($medios_); $index++) {
            $sql2 = "SELECT COUNT( *) as total from prospeccion p "
                    . "inner JOIN detalle_prospeccion d on p.curp = d.curp   "
                    . "where p.id_medio = '$idmedios_[$index]' and d.nom_usu='$codigovendedor'";
            $ejecutar = $conexion->query(utf8_decode($sql2));
            $reg = $ejecutar->fetch_assoc();
            $tem[$medios_[$index]] = utf8_encode($reg["total"]);
            $total = (int) utf8_encode($reg["total"]) + (int) $total;
        }
        $tem["TOTAL"] = $total;
        $datos[$j] = $tem;
        $j++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == 0 && $medios == "false" && $ocupaciones == "true" && $referido == "false" && $fracc == "false") {
    //se obtienes todos los vendedores
    $sql = "SELECT nom_usu, nombres_usu, ape_paterno_usu ,ape_materno_usu from usuario where id_perfil ='1' and estatus ='1'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $datos = array(); //arreglo que tendra los datos finales
    $i = 0;
    $j = 0;
    $sql0 = "select * from ocupaciones where estatus='1' "; //lista de todos los medios
    $ejecutar_consulta0 = $conexion->query(utf8_decode($sql0));
    $ocupaciones_ = array(); //almacenaran los nombre
    $idocupaciones_ = array(); //almacenaran los ids
    while ($registro = $ejecutar_consulta0->fetch_assoc()) {
        $ocupaciones_[$i] = utf8_encode($registro["ocupacion"]);
        $idocupaciones_ [$i] = utf8_encode($registro["id_ocupacion"]);
        $i++;
    }
    //se eejcuta el ciclo para los asesores
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $codigovendedor = utf8_encode($registro["nom_usu"]);
        $nombre = utf8_encode($registro["nombres_usu"]);
        $apellidop = utf8_encode($registro["ape_paterno_usu"]);
        $apellidom = utf8_encode($registro["ape_materno_usu"]);
        $tem = array("#" => $j + 1,
            "CÓDIGO DEL VENDEDOR" => $codigovendedor,
            "NOMBRE" => $nombre,
            "PRIMER APELLIDO" => $apellidop,
            "SEGUNDO APELLIDO" => $apellidom
        );
        $total = 0;
        for ($index = 0; $index < count($ocupaciones_); $index++) {

            $sql2 = "SELECT COUNT( *) as total from prospeccion p "
                    . "inner JOIN detalle_prospeccion d on p.curp = d.curp   "
                    . "where p.id_ocupacion = '$idocupaciones_[$index]' and d.nom_usu='$codigovendedor'";
            $ejecutar = $conexion->query(utf8_decode($sql2));
            $reg = $ejecutar->fetch_assoc();
            $tem[$ocupaciones_[$index]] = utf8_encode($reg["total"]);
            $total = (int) utf8_encode($reg["total"]) + (int) $total;
        }
        $tem["TOTAL"] = $total;
        $datos[$j] = $tem;
        $j++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == 0 && $medios == "false" && $ocupaciones == "false" && $referido == "true" && $fracc == "false") {
    //se obtienes todos los vendedores
    $sql = "SELECT nom_usu, nombres_usu, ape_paterno_usu ,ape_materno_usu from usuario where id_perfil ='1' and estatus ='1'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $datos = array(); //arreglo que tendra los datos finales
    $i = 0;
    $j = 0;
    $sql0 = "select * from referidos where estatus='1' "; //lista de todos los medios
    $ejecutar_consulta0 = $conexion->query(utf8_decode($sql0));
    $ocupaciones_ = array(); //almacenaran los nombre
    $idocupaciones_ = array(); //almacenaran los ids
    while ($registro = $ejecutar_consulta0->fetch_assoc()) {
        $ocupaciones_[$i] = utf8_encode($registro["nombre_referido"])
                . ' ' . utf8_encode($registro["apellido_paterno_referido"])
                . ' ' . utf8_encode($registro["apellido_materno_referido"]);
        $idocupaciones_ [$i] = utf8_encode($registro["id_referido"]);
        $i++;
    }
    //se eejcuta el ciclo para los asesores
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $codigovendedor = utf8_encode($registro["nom_usu"]);
        $nombre = utf8_encode($registro["nombres_usu"]);
        $apellidop = utf8_encode($registro["ape_paterno_usu"]);
        $apellidom = utf8_encode($registro["ape_materno_usu"]);
        $tem = array("#" => $j + 1,
            "CÓDIGO DEL VENDEDOR" => $codigovendedor,
            "NOMBRE" => $nombre,
            "PRIMER APELLIDO" => $apellidop,
            "SEGUNDO APELLIDO" => $apellidom
        );
        $total = 0;
        for ($index = 0; $index < count($ocupaciones_); $index++) {

            $sql2 = "SELECT COUNT( *) as total from prospeccion p "
                    . "inner JOIN detalle_prospeccion d on p.curp = d.curp   "
                    . "where p.id_referido = '$idocupaciones_[$index]' and d.nom_usu='$codigovendedor'";
            $ejecutar = $conexion->query(utf8_decode($sql2));
            $reg = $ejecutar->fetch_assoc();
            if ($idocupaciones_[$index] == "0") {
                $tem["SIN REFERIDO"] = utf8_encode($reg["total"]);
            } else {
                $tem[$ocupaciones_[$index]] = utf8_encode($reg["total"]);
            }

            $total = (int) utf8_encode($reg["total"]) + (int) $total;
        }
        $tem["TOTAL"] = $total;
        $datos[$j] = $tem;
        $j++;
    }
    echo json_encode($datos);
}
if ($fecha1 == "" && $fecha2 == "" && $id == 0 && $medios == "false" && $ocupaciones == "false" && $referido == "false" && $fracc == "true") {
    $sql = "SELECT * from contrato c
INNER JOIN proceso_adquisicion pa on c.id_proceso_adqusicion =pa.id_proceso_adqusicion
INNER JOIN prospeccion p on c.prospecto = p.curp
INNER JOIN detalle_prospeccion de on p.curp = de.curp
INNER JOIN usuario u on de.nom_usu = u.nom_usu
INNER JOIN departamentos d on c.id_departamento = d.id_departamento
INNER JOIN fraccionamientos f on d.id_fraccionamiento = f.id_fraccionamiento
INNER JOIN creditos cr on c.id_credito = cr.id_credito
INNER JOIN medios m on p.id_medio = m.id_medio
INNER JOIN referidos r on p.id_referido =r.id_referido
INNER JOIN ocupaciones o on p.id_ocupacion = o.id_ocupacion
where estado_contrato =2";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $datos = array();
    $i = 0;
    while ($row = $ejecutar_consulta->fetch_assoc()) {
        $tem = array("#" => $i + 1,
            "CÓDIGO DEL CLIENTE" => utf8_encode($row["curp"]),
            "NOMBRE" => utf8_encode($row["nombres"]),
            "PRIMER APELLIDO" => utf8_encode($row["apellido_paterno"]),
            "SEGUNDO APELLIDO" => utf8_encode($row["apellido_materno"]),
            "FECHA DE COMPRA" => utf8_encode($row["fecha_contrato"]),
            "OCUPACION" => utf8_encode($row["ocupacion"]),
            "MEDIO" => utf8_encode($row["medio"]),
            "COD DEPARTAMENTO" => utf8_encode($row["id_departamento"]),
            "CALLE" => utf8_encode($row["calle"]),
            "MZN" => utf8_encode($row["manzana"]),
            "NUM" => utf8_encode($row["numero"]),
            "LOTE" => utf8_encode($row["lote"]),
            "EDIFICIO" => utf8_encode($row["edificio"]),
            "COSTO" => utf8_encode($row["costo_departamento"]),
            "CREDITO" => utf8_encode($row["credito"]),
            "COD VENDEDOR" => utf8_encode($row["nom_usu"]),
            "NOMBRE VENDEDOR" => utf8_encode($row["nombres_usu"]) . ' '
            . utf8_encode($row["ape_paterno_usu"])
        );
        $datos[$i] = $tem;
        $i++;
    }
    echo json_encode($datos);
//se obtienes todos los vendedores
    /* $sql = "SELECT nom_usu, nombres_usu, ape_paterno_usu ,ape_materno_usu from usuario where id_perfil ='1' and estatus ='1'";
      $ejecutar_consulta = $conexion->query(utf8_decode($sql));
      $datos = array(); //arreglo que tendra los datos finales
      $i = 0;
      $j = 0;
      $sql0 = "select * from referidos where estatus='1' "; //lista de todos los medios
      $ejecutar_consulta0 = $conexion->query(utf8_decode($sql0));
      $ocupaciones_ = array(); //almacenaran los nombre
      $idocupaciones_ = array(); //almacenaran los ids
      while ($registro = $ejecutar_consulta0->fetch_assoc()) {
      $ocupaciones_[$i] = utf8_encode($registro["nombre_referido"])
      . ' ' . utf8_encode($registro["apellido_paterno_referido"])
      . ' ' . utf8_encode($registro["apellido_materno_referido"]);
      $idocupaciones_ [$i] = utf8_encode($registro["id_referido"]);
      $i++;
      }
      //se eejcuta el ciclo para los asesores
      while ($registro = $ejecutar_consulta->fetch_assoc()) {
      $codigovendedor = utf8_encode($registro["nom_usu"]);
      $nombre = utf8_encode($registro["nombres_usu"]);
      $apellidop = utf8_encode($registro["ape_paterno_usu"]);
      $apellidom = utf8_encode($registro["ape_materno_usu"]);
      $tem = array("#" => $j + 1,
      "CÓDIGO DEL VENDEDOR" => $codigovendedor,
      "NOMBRE" => $nombre,
      "PRIMER APELLIDO" => $apellidop,
      "SEGUNDO APELLIDO" => $apellidom
      );
      $total = 0;
      for ($index = 0; $index < count($ocupaciones_); $index++) {

      $sql2 = "SELECT COUNT( *) as total from prospeccion p "
      . "inner JOIN detalle_prospeccion d on p.curp = d.curp   "
      . "where p.id_referido = '$idocupaciones_[$index]' and d.nom_usu='$codigovendedor'";
      $ejecutar = $conexion->query(utf8_decode($sql2));
      $reg = $ejecutar->fetch_assoc();
      if ($idocupaciones_[$index] == "0") {
      $tem["SIN REFERIDO"] = utf8_encode($reg["total"]);
      } else {
      $tem[$ocupaciones_[$index]] = utf8_encode($reg["total"]);
      }

      $total = (int) utf8_encode($reg["total"]) + (int) $total;
      }
      $tem["TOTAL"] = $total;
      $datos[$j] = $tem;
      $j++;
      }
      echo json_encode($datos); */
}