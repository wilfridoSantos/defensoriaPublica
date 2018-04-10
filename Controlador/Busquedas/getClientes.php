<?php

$identificador = $_POST["valor"];
$usuario = $_POST["usuario"];
$rol = $_POST["rol"];
include '../conexion.php';
$sql;
$RegistrosAMostrar = 10;
$RegistrosAEmpezar;
$PagAct = $_POST["pag"];
if ($PagAct == 0) {
    $RegistrosAEmpezar = 0;
    $PagAct = 1;
} else {
    $RegistrosAEmpezar = ($PagAct - 1) * $RegistrosAMostrar;
}

$PagAnt = $PagAct - 1;
$PagSig = $PagAct + 1;
if ($rol == "1") {
    $sql = "SELECT * from contrato c  INNER JOIN prospeccion"
            . "  p on c.prospecto = p.curp INNER JOIN "
            . "detalle_prospeccion d on c.prospecto = d.curp "
            . "where d.nom_usu ='$usuario' and CONCAT(p.nombres,' '
            ,p.apellido_paterno,' ',p.apellido_materno)
            like '%$identificador%' ORDER BY c.estado_contrato limit $RegistrosAEmpezar,$RegistrosAMostrar ";
} else {
    $sql = "SELECT * from contrato c  INNER JOIN prospeccion"
            . "  p on c.prospecto = p.curp INNER JOIN "
            . "detalle_prospeccion d on c.prospecto = d.curp "
            . "where  CONCAT(p.nombres,' '
            ,p.apellido_paterno,' ',p.apellido_materno)
            like '%$identificador%' ORDER BY c.estado_contrato limit $RegistrosAEmpezar,$RegistrosAMostrar";
}

$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs > 0) {
    echo '<div class="container-fluid">';
    echo '<div class="div-table">';
    echo '<div class="div-table-row div-table-head">';
    echo '<div class="div-table-cell">Código</div>';
    echo '<div class="div-table-cell">Nombre</div>';
    echo '<div class="div-table-cell">Apellido paterno</div>';
    echo '<div class="div-table-cell">Apellido materno</div>';
    echo '<div class="div-table-cell">Estatus</div>';
    if ($rol == "2") {
        echo '<div class="div-table-cell">Escritura</div>';
    }
    echo '<div class="div-table-cell">Contrato</div>';
    echo '<div class="div-table-cell"></div>';

    echo '</div>';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $btn = "";
        $block = 'disabled';
        $blockc = '';

        switch (utf8_encode($registro["estado_contrato"])) {
            case "0":
                $btn = '<button value="' . utf8_encode($registro["curp"]) . '" class="btn btn-info tooltips-general col-md-offset-1" onclick="busquedaSelectiva(this)"><i class="zmdi zmdi-time-interval"></i></button>&nbsp;&nbsp;Espera&nbsp;&nbsp;&nbsp;&nbsp;';
                $blockc = 'disabled';
                break;
            case "1":
                $btn = '<button value="' . utf8_encode($registro["curp"]) . '" class="btn btn-warning tooltips-general col-md-offset-1" onclick="busquedaSelectiva(this)"><i class="zmdi zmdi-book"></i></button>&nbsp;&nbsp;Revisión&nbsp;&nbsp;';
                break;
            case "2":
                $block = '';
                $btn = '<button value="' . utf8_encode($registro["curp"]) . '" class="btn btn-success tooltips-general col-md-offset-1" onclick="busquedaSelectiva(this)"><i class="zmdi zmdi-check"></i></button>&nbsp;&nbsp;Aprobado&nbsp;';
                break;
            case "3":
                $btn = '<button value="' . utf8_encode($registro["curp"]) . '" class="btn btn-danger tooltips-general col-md-offset-1" onclick="busquedaSelectiva(this)"><i class="zmdi zmdi-block"></i></button>&nbsp;&nbsp;Cancelado';
                break;
        }
        if (utf8_encode($registro["id_proceso_adqusicion"]) == "2") {
            $block = 'disabled';
        }
        echo '<div class="div-table-row">';
        echo '<div class="div-table-cell" id="usuario">' . utf8_encode($registro["curp"]) . '</div>';
        echo '<div class="div-table-cell" id="usuario">' . utf8_encode($registro["nombres"]) . '</div>';
        echo '<div class="div-table-cell" id="usuario">' . utf8_encode($registro["apellido_paterno"]) . '</div>';
        echo '<div class="div-table-cell" id="usuario">' . utf8_encode($registro["apellido_materno"]) . '</div>';
        echo '<div class="div-table-cell" id="usuario">';
        echo $btn;
        echo '</div>';
        if ($rol == "2") {
            echo '<div class="div-table-cell" id="usuario">';
            echo '<button ' . $block . ' value="' . utf8_encode($registro["id_contrato"]) . '" class="btn btn-success tooltips-general col-md-offset-1" onclick="aprobarEscritura(this)"><i class="zmdi zmdi-file"></i></button>&nbsp;&nbsp;Aprobar&nbsp;&nbsp;';
            echo '</div>';
        }
        echo '<div class="div-table-cell">';
        echo '<button ' . $blockc . ' value="' . utf8_encode($registro["id_contrato"])
        . '" class="btn btn-success" '
        . ' data-toggle="modal" data-target="#modalcontrato" onclick="cargarDatosContratoTem(this)">'
        . '<i class="zmdi zmdi-book" ></i>&nbsp;&nbsp;Contrato</button>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    if ($usuario == 2) {
        $sql0 = "SELECT * from contrato c  INNER JOIN prospeccion"
                . "  p on c.prospecto = p.curp INNER JOIN "
                . "detalle_prospeccion d on c.prospecto = d.curp "
                . "where  CONCAT(p.nombres,' '
            ,p.apellido_paterno,' ',p.apellido_materno)
            like '%$identificador%'";
    } else {
        $sql0 = "SELECT * from contrato c  INNER JOIN prospeccion"
                . "  p on c.prospecto = p.curp INNER JOIN "
                . "detalle_prospeccion d on c.prospecto = d.curp "
                . "where  CONCAT(p.nombres,' '
            ,p.apellido_paterno,' ',p.apellido_materno)
            like '%$identificador%'";
    }

    $ejecutar_consulta = $conexion->query(utf8_decode($sql0));
    $num_regs0 = $ejecutar_consulta->num_rows;
    $PagUlt = $num_regs0 / $RegistrosAMostrar;
    $Res = $num_regs0 % $RegistrosAMostrar;
    if ($Res > 0) {
        $PagUlt = floor($PagUlt) + 1;
    }
    echo '<div class="text-center col-md-12">';
    echo "<button class='btn btn_link' onclick=\"buscarclientes('$identificador','0')\">Primero</button> ";
    if ($PagAct > 1) {
        echo "<button class='btn btn_link' onclick=\"buscarclientes('$identificador','$PagAnt')\"><<</button> ";
    }
    echo "<strong>Pagina " . $PagAct . "/" . $PagUlt . "</strong>";
    if ($PagAct < $PagUlt) {
        echo " <button class='btn btn_link' onclick=\"buscarclientes('$identificador','$PagSig')\">>></button> ";
    }
    echo "<button class='btn btn_link' onclick=\"buscarclientes('$identificador','$PagUlt')\">Ultimo</button>";
    echo '</div>';
} else {
    echo '<div class="text-center">';
    echo '<h3>Sin resultados</h3>';
    echo '</div>';
}