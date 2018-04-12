<?php

$id = $_POST["id"];

require_once('../../tcpdf/tcpdf.php');
include '../conexion.php';
$sql = "SELECT * FROM contrato c
inner JOIN prospeccion p on c.prospecto = p.curp
INNER JOIN detalle_prospeccion d  on c.prospecto = d.curp
inner join usuario u on d.nom_usu= u.nom_usu
inner join departamentos f on f.id_departamento = c.id_departamento
inner join fraccionamientos g on g.id_fraccionamiento = f.id_fraccionamiento
INNER JOIN estado_civil ec on ec.id_estado_civil = p.id_estado_civil
INNER JOIN ocupaciones oc on oc.id_ocupacion = p.id_ocupacion
INNER JOIN sucursales suc on suc.id_sucursal = u.id_sucursal
where  c.id_contrato='$id';";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$registro = $ejecutar_consulta->fetch_assoc();
$estatus = utf8_encode($registro["estado_contrato"]);
$idcontrato = utf8_encode($registro["id_contrato"]);
if ($estatus == "0") {

    $consulta = "update contrato set estado_contrato='1' "
            . " where id_contrato='$idcontrato'";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
}
$cliente = utf8_encode($registro["prospecto"]);
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('@GESO VIVIENDA');
$pdf->SetTitle('DATOS DEL CONTRATO');
$pdf->SetHeaderData('../../assets/img/mini.png', 15, "DATOS DE CONTRATO", "CLIENTE: " . utf8_encode($registro["prospecto"]));
$pdf->setHeaderFont(Array('Helvetica', '', 15));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 15, 10, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Helvetica', '', 10.5);
$pdf->addPage();
$content = '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DATOS DEL CLIENTE</h3>';
$content .= '<table  cellpadding="5">';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CÓDIGO DEL CLIENTE:</strong></td>
            <td>' . utf8_encode($registro["prospecto"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>NOMBRE(S):</strong></td>
            <td>' . utf8_encode($registro["nombres"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>PRIMER APELLIDO:</strong></td>
            <td>' . utf8_encode($registro["apellido_paterno"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>SEGUNDO APELLIDO:</strong></td>
            <td>' . utf8_encode($registro["apellido_materno"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>NSS:</strong></td>
            <td>' . utf8_encode($registro["nss"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CURP:</strong></td>
            <td>' . utf8_encode($registro["clave_curp"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>TELÉFONO:</strong></td>
            <td>' . utf8_encode($registro["telefono"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>ESTADO CIVIL:</strong></td>
            <td>' . utf8_encode($registro["estado_civil"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>OCUPACÓN:</strong></td>
            <td>' . utf8_encode($registro["ocupacion"]) . '</td><td></td></tr>';
$content .= '</table>';
$content .= '</div></div>';


$content .= '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DATOS DEL ASESOR</h3>';
$content .= '<table  cellpadding="5">';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CÓDIGO DEL ASESOR:</strong></td>
            <td>' . utf8_encode($registro["nom_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>NOMBRE(S):</strong></td>
            <td>' . utf8_encode($registro["nombres_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>PRIMER APELLIDO:</strong></td>
            <td>' . utf8_encode($registro["ape_paterno_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>SEGUNDO APELLIDO:</strong></td>
            <td>' . utf8_encode($registro["ape_materno_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>TELÉFONO:</strong></td>
            <td>' . utf8_encode($registro["telefono_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CORREO:</strong></td>
            <td>' . utf8_encode($registro["correo_usu"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>SUCURSAL:</strong></td>
            <td>' . utf8_encode($registro["nombre_suc"]) . '</td><td></td></tr>';
$content .= '</table>';
$content .= '</div></div>';

$content .= '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DATOS DEL DEPARTAMENTO</h3>';
$content .= '<table border="0" cellpadding="5">';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>FRACCIONAMIENTO:</strong></p></td>
             <td>' . utf8_encode($registro["nombre_fraccionamiento"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>LOTE:</strong></p></td>
            <td>' . utf8_encode($registro["lote"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>MANZANA:</strong></p></td>
            <td>' . utf8_encode($registro["manzana"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>CALLE:</strong></p></td>
            <td>' . utf8_encode($registro["calle"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>NÚMERO:</strong></p></td>
            <td>' . utf8_encode($registro["numero"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>COSTO:</strong></p></td>
            <td>' . utf8_encode($registro["costo_departamento"]) . '</td><td></td></tr>';
$content .= '</table>';
$content .= '</div></div>';

$btn;
switch ($estatus) {
    case "2":
        $btn = "APROBADO";
        break;
    case "3":
        $btn = "CANCELADO";
        break;
    default :
        $btn = "REVISIÓN";
        break;
}

if (utf8_encode($registro["id_seguro"]) != "") {
    $ids = utf8_encode($registro["id_seguro"]);
    $sql = "SELECT * FROM detalle_seguros d
  INNER JOIN cobertura_seguro c on d.id_cobertura = c.id_cobertura_seguro
  INNER JOIN seguros s on d.seguro = s.id_seguro
  where seguro ='$ids'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    $content .= '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DATOS DEL SEGURO</h3>';
    $i = 0;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $date = date_create($registro["fecha"]);

        if ($i == 0) {
            $content .= '<table border="0" cellpadding="5">';
            $content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>COSTO TOTAL:</strong></p></td>
             <td>' . utf8_encode($registro["costo_total"]) . '</td><td></td></tr>';
            $content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>AÑOS:</strong></p></td>
             <td>' . utf8_encode($registro["anios"]) . '</td><td></td></tr>';
            $content .= '<tr bgcolor="#f5f5f5"><td></td><td><p><strong>FECHA INICIO:</strong></p></td>
             <td>' . date_format($date, 'd/m/Y') . '</td><td></td></tr>';
            $content .= '</table>';
            $content .= '<h3 style="text-align:center;">DETALLE</h3>';
        }
        $content .= '<h4 style="text-align:center;"> APLICA A: ' . utf8_encode($registro["tipo_de_cobertura"]) . '</h4>';
        $content .= '<div class="col-md-12">';
        $content .= '<table border="0" cellpadding="5">';
        $content .= '<tr bgcolor="#f5f5f5"><td><p><strong>COSTO ANUAL:</strong></p></td><td>' . utf8_encode($registro["costo_por_anio"]) . '</td>
             <td><p><strong>DESCUENTO ANUAL:</strong></p></td><td>' . utf8_encode($registro["descuento_por_anio"]) . '</td></tr>';
        $content .= '</table>';
        $content .= '</div>';
        $i++;
    }
}
$content .= '</div></div>';
$content .= '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">PROCESO DEL CONTRATO: ' . $btn . '</h3>';
$content .= '</div></div>';

$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('../../pdf/reportes/' . $id . '.pdf', 'F');


echo json_encode(array($idcontrato, $cliente));
/*include '../conexion.php';
$sql = "SELECT * FROM contrato c
inner JOIN prospeccion p on c.prospecto = p.curp
INNER JOIN detalle_prospeccion d  on c.prospecto = d.curp
inner join usuario u on d.nom_usu= u.nom_usu
inner join departamentos f on f.id_departamento = c.id_departamento
inner join fraccionamientos g on g.id_fraccionamiento = f.id_fraccionamiento
INNER JOIN estado_civil ec on ec.id_estado_civil = p.id_estado_civil
INNER JOIN ocupaciones oc on oc.id_ocupacion = p.id_ocupacion
INNER JOIN sucursales suc on suc.id_sucursal = u.id_sucursal
where (c.estado_contrato='0' or c.estado_contrato='1') and p.curp='$id';";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$registro = $ejecutar_consulta->fetch_assoc();
$estatus = utf8_encode($registro["estado_contrato"]);
if ($estatus == "0") {
    $idcontrato= utf8_encode($registro["id_contrato"]);
    $consulta = "update contrato set estado_contrato='1' "
            . " where id_contrato='$idcontrato'";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
}
$datos = array(
    utf8_encode($registro["prospecto"]),
    utf8_encode($registro["nombres"]),
    utf8_encode($registro["apellido_paterno"]),
    utf8_encode($registro["apellido_materno"]),
    utf8_encode($registro["telefono"]),
    utf8_encode($registro["estado_civil"]),
    utf8_encode($registro["ocupacion"]),
    utf8_encode($registro["nom_usu"]),
    utf8_encode($registro["nombres_usu"]),
    utf8_encode($registro["ape_paterno_usu"]),
    utf8_encode($registro["ape_materno_usu"]),
    utf8_encode($registro["telefono_usu"]),
    utf8_encode($registro["correo_usu"]),
    utf8_encode($registro["nombre_suc"]),
    utf8_encode($registro["nombre_fraccionamiento"]),
    utf8_encode($registro["lote"]),
    utf8_encode($registro["manzana"]),
    utf8_encode($registro["calle"]),
    utf8_encode($registro["numero"]),
    utf8_encode($registro["costo_departamento"]),
    utf8_encode($registro["id_seguro"]),
    utf8_encode($registro["estado_contrato"])
);
echo json_encode($datos);*/
/*var result = JSON.parse(data);
            var contenido = '<div class="text-center"><h2><strong>CONTRATO</strong></h2></div>';
            contenido += '<div class="col-md-6">';
            contenido += '<div class="text-center"><h3><strong>DATOS DEL CLIENTE</strong></h3></div>';
            contenido += '<div class="col-md-offset-2">';
            contenido += '<table>';
            contenido += "<tr><td><p><strong>CÓDIGO DEL CLIENTE:&nbsp;&nbsp;</strong></p></td><td><p>" + result[0] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>NOMBRE(S):&nbsp;&nbsp;</strong></p></td><td><p>" + result[1] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>PRIMER APELLIDO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[2] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>SEGUNDO APELLIDO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[3] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>TELÉFONO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[4] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>ESTADO CIVIL:&nbsp;&nbsp;</strong></p></td><td><p>" + result[5] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>OCUPACIÓN:&nbsp;&nbsp;</strong></p></td><td><p>" + result[6] + "<p></td></tr>";
            contenido += '</table>';
            contenido += '</div>';
            contenido += '</div>';
            contenido += '<div class="col-md-6">';
            contenido += '<div class="text-center"><h3><strong>DATOS DEL ASESOR</strong></h3></div>';
            contenido += '<div class="col-md-offset-2">';
            contenido += '<table>';
            contenido += "<tr><td><p><strong>CÓDIGO DEL ASESOR:&nbsp;&nbsp;</strong></p></td><td><p>" + result[7] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>NOMBRE(S):&nbsp;&nbsp;</strong></p></td><td><p>" + result[8] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>PRIMER APELLIDO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[9] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>SEGUNDO APELLIDO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[10] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>TELÉFONO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[11] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>CORREO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[12] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>SUCURSAL:&nbsp;&nbsp;</strong></p></td><td><p>" + result[13] + "<p></td></tr>";
            contenido += '</table>';
            contenido += '</div>';
            contenido += '</div>';

            contenido += '<div class="col-md-6">';
            contenido += '<div class="text-center"><h3><strong>DATOS DEL SEGURO</strong></h3></div>';
            contenido += '<div class="col-md-offset-2">';
            contenido += '<table id="tablaseguro">';

            var tem = "";
            if (result[20].length > 0) {
                $.ajax({
                    url: "php/Busquedas/detalleSeguro.php",
                    type: "post",
                    data: "idseguro=" + result[20],
                    success: function (data) {
                        var resultseguro = JSON.parse(data);
                        for (var i = 0; i < resultseguro.length; i++) {
                            tem += "<tr><td><p><strong>APLICA A:&nbsp;&nbsp;</strong></p></td><td><p>" + resultseguro[i][0] + "<p></td></tr>";
                            tem += "<tr><td></td><td><p><strong>*COSTO ANUAL:&nbsp;&nbsp;</strong>$" + resultseguro[i][1];
                            tem += "&nbsp;&nbsp;<strong>*DESCUENTO ANUAL:&nbsp;&nbsp;</strong>" + resultseguro[i][2] + "%</p></td>";
                            tem += "</tr>";
                        }
                        tem += "<tr><td><p><strong>TOTAL:&nbsp;&nbsp;</strong></p></td><td><p>$" + resultseguro[0][3] + "<p></td></tr>";
                        tem += "<tr><td><p><strong>AÑOS:&nbsp;&nbsp;</strong></p></td><td><p>" + resultseguro[0][4] + "<p></td></tr>";
                        $('#tablaseguro').html(tem);
                    }
                });
            } else {
                contenido += "<tr><td><p><strong>SIN SEGURO CONTRATADO</strong><p></td></tr>";
            }
            contenido += '</table>';
            contenido += '</div>';
            contenido += '</div>';
            contenido += '<div class="col-md-6">';
            contenido += '<div class="text-center"><h3><strong>DATOS DE ADQUISIÓN</strong></h3></div>';
            contenido += '<div class="col-md-offset-2">';
            contenido += '<table>';
            contenido += "<tr><td><p><strong>FRACCIONAMIENTO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[14] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>LOTE:&nbsp;&nbsp;</strong></p></td><td><p>" + result[15] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>MANZANA:&nbsp;&nbsp;</strong></p></td><td><p>" + result[16] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>CALLE:&nbsp;&nbsp;</strong></p></td><td><p>" + result[17] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>NUMERO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[18] + "<p></td></tr>";
            contenido += "<tr><td><p><strong>COSTO:&nbsp;&nbsp;</strong></p></td><td><p>" + result[19] + "<p></td></tr>";
            contenido += '</table>';
            contenido += '</div>';
            contenido += '</div>';
            $('#datosContrato').html(contenido);*/
