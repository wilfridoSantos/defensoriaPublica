<?php

$id = $_POST["id"];
$id = $_POST["id"];

require_once('../../tcpdf/tcpdf.php');
include '../conexion.php';
$estados = array("aguascalientes", "baja california", "baja california sur", "campeche", "chiapas", "chihuahua", "coahuila", "colima", "ciudad de mexico", "distrito federal", "durango", "guanajuato", "guerrero", "hidalgo", "jalisco", "estado de mexico", "michoacan", "morelos", "nayarit", "nuevo leon", "oaxaca", "puebla", "queretaro", "quintana roo", "san luis potosi", "sinaloa", "sonora", "tabasco", "tamaulipas", "tlaxcala", "veracruz", "yucatan", "zacatecas");
$abreviacion = array("AS", "BC", "BS", "CC", "CS", "CH", "CL", "CM", "CX", "DF", "DG", "GT", "GR", "HG", "JC", "MC", "MN", "MS", "NT", "NL", "OC", "PL", "QT", "QR", "SP", "SL", "SR", "TC", "TS", "TL", "VZ", "YN", "ZS");
$sql = "SELECT * FROM prospeccion p
INNER JOIN estado_civil est on p.id_estado_civil = est.id_estado_civil
INNER JOIN ocupaciones o on p.id_ocupacion = o.id_ocupacion
INNER JOIN medios m on m.id_medio = p.id_medio
INNER JOIN detalle_prospeccion d  on d.curp = p.curp
where p.curp='$id';";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$registro = $ejecutar_consulta->fetch_assoc();
$cliente = utf8_encode($registro["curp"]);
$ab = substr($cliente, -5, 2);
$indexOf = 0;
for ($index = 0; $index < count($abreviacion); $index++) {
    if ($abreviacion[$index] == $ab) {
        $indexOf = $index;
        break;
    }
}
$fecha = utf8_encode($registro["fecha_nacimiento"]);
$sexo = "MASCULINO";
if (utf8_encode($registro["sexo"]) == "F") {
    $sexo = "FEMENINO";
}
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('@GESO VIVIENDA');
$pdf->SetTitle('DATOS DEL CONTRATO');
$pdf->SetHeaderData('../../assets/img/mini.png', 20, "DATOS DEL PROSPECTO", utf8_encode($registro["curp"]));
$pdf->setHeaderFont(Array('Helvetica', '', 20));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 20, 10, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Helvetica', '', 10.5);
$pdf->addPage();
$content = '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DATOS GENERALES</h3>';
$content .= '<table  cellpadding="5">';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CÓDIGO DEL CLIENTE:</strong></td>
            <td>' . utf8_encode($registro["curp"]) . '</td><td></td></tr>';
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
            <td></td><td><strong>FECHA DE NACIMINETO:</strong></td>
            <td>' . obtenerFechaEnLetra($fecha) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>SEXO:</strong></td>
            <td>' . $sexo . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>TELÉFONO:</strong></td>
            <td>' . utf8_encode($registro["telefono"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CURP:</strong></td>
            <td>' . utf8_encode($registro["clave_curp"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>NSS:</strong></td>
            <td>' . utf8_encode($registro["nss"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>ESTADO CIVIL:</strong></td>
            <td>' . utf8_encode($registro["estado_civil"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>OCUPACIÓN:</strong></td>
            <td>' . utf8_encode($registro["ocupacion"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>COMO SE ENTERO:</strong></td>
            <td>' . utf8_encode($registro["medio"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>FECHA DE REGISTRO:</strong></td>
            <td>' . obtenerFechaEnLetra(utf8_encode($registro["fecha_inicio"])) . '</td><td></td></tr>';
$content .= '</table>';
$content .= '</div></div>';
$content .= '<div class="row">
        	<div class="col-md-12">
            	<h3 style="text-align:center;">DIRECCIÓN</h3>';
$content .= '<table  cellpadding="5">';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CALLE:</strong></td>
            <td>' . utf8_encode($registro["calle_direccion"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>NÚMERO:</strong></td>
            <td>' . utf8_encode($registro["numero_direccion"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>CÓDIGO POSTAL:</strong></td>
            <td>' . utf8_encode($registro["codigo_postal"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>COLONIA:</strong></td>
            <td>' . utf8_encode($registro["colonia"]) . '</td><td></td></tr>';
$content .= '<tr bgcolor="#f5f5f5">
            <td></td><td><strong>ESTADO:</strong></td>
            <td>' . strtoupper($estados[$indexOf]) . '</td><td></td></tr>';
$content .= '</table>';
$content .= '</div></div>';
$content .= '<div class="row">
        	<div class="col-md-12">';
$sql0 = "select * from historial where codigo_prospecto ='$cliente'";
$ejecutar = $conexion->query($sql0);
$num_regs = $ejecutar->num_rows;
if ($num_regs > 0) {
    $content .= '<br><br><br><br><br><br><br><br><br><br>';

    $content .= '<h3 style="text-align:center;">HISTORIAL</h3>';
    $content .= '<table border="1" cellpadding="5">';
    $content .= '<tr bgcolor="#13ABA6">
                <th >FECHA</th>
                <th>HORA</th>
                <th>MENSAJE</th>
                </tr>';

    while ($reg = $ejecutar->fetch_assoc()) {
        $color = '#70D624';
        if (utf8_encode($reg["enviado_por"] != "1")) {

            $color = '#C2D10D';
        }
        $content .= '<tr bgcolor="' . $color . '" >
                <th>' . obtenerFechaEnLetra(utf8_encode($reg["fecha"])) . '</th>
                <th>' . utf8_encode($reg["hora"]) . '</th>
                <th>' . utf8_encode($reg["comentario_historial"]) . '</th>
                </tr>';
    }
    $content .= '</table>';
} else {
    $content .= '<h4 style="text-align:center;">SIN MENSAJES</h4>';
}


$content .= '</div></div>';
$ruta = '../../temp/' . $id . '.pdf';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->output($ruta, 'F');

function obtenerFechaEnLetra($fecha) {
    $dia = conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha)) * 1) - 1];
    $pre = " de ";
    $d = (int) $anno;
    if ($d >= 2000) {
        $pre = " del ";
    }
    return $dia . ', ' . $num . ' de ' . $mes . $pre . $anno;
}

function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
