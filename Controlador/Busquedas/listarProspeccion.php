<?php

$valor = $_POST["valor"];
$usuario = $_POST["usuario"];
$rol = $_POST["rol"];
$PagAct = $_POST["pag"];
include "../conexion.php";
$RegistrosAMostrar = 10;
$RegistrosAEmpezar;
if ($PagAct == 0) {
    $RegistrosAEmpezar = 0;
    $PagAct = 1;
} else {
    $RegistrosAEmpezar = ($PagAct - 1) * $RegistrosAMostrar;
}

$PagAnt = $PagAct - 1;
$PagSig = $PagAct + 1;
$sql;
if ($rol == 1) {

    $sql = "SELECT * FROM prospeccion p "
            . "INNER JOIN detalle_prospeccion d "
            . "ON p.curp = d.curp "
            . "where  d.nom_usu='$usuario' and (CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno)"
            . " like '%$valor%' "
            . "OR p.curp like '%$valor%') "
            . "ORDER BY nombres ,apellido_paterno,apellido_materno "
            . "ASC limit $RegistrosAEmpezar,$RegistrosAMostrar ";
} else {
    $sql = "SELECT * FROM prospeccion p "
            . "INNER JOIN detalle_prospeccion d "
            . "ON p.curp = d.curp "
            . "where CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno)"
            . " like '%$valor%' "
            . "OR p.curp like '%$valor%' "
            . "ORDER BY nombres ,apellido_paterno,apellido_materno "
            . "ASC limit $RegistrosAEmpezar,$RegistrosAMostrar ";
}

$ejecutar_consulta_resgistros = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta_resgistros->num_rows;
if ($num_regs == 0) {
    echo '<h3 class="text-center all-tittles">No hay ningun resultado</h3>';
} else {
    echo '<div class="container-fluid">';
    echo '<div class="div-table">';
    echo '<div class="div-table-row div-table-head">';
    echo '<div class="div-table-cell">#</div>';
    echo '<div class="div-table-cell">Codigo</div>';
    echo '<div class="div-table-cell">Nombre</div>';
    echo '<div class="div-table-cell">Apellido Paterno</div>';
    echo '<div class="div-table-cell">Apellido Materno</div>';
    echo '<div class="div-table-cell">Telefono</div>';
    echo '<div class="div-table-cell">Activo desde</div>';
    echo '<div class="div-table-cell">Detalle</div>';
    if ($rol == 2) {
        echo '<div class="div-table-cell">Cambiar asesor</div>';
    }
    if ($rol == 3) {
        echo '<div class="div-table-cell">Editar</div>';
    }
    echo '</div>';
    $i = $RegistrosAEmpezar + 1;
    while ($registro = $ejecutar_consulta_resgistros->fetch_assoc()) {
        echo '<div class="div-table-row">';
        echo '<div class="div-table-cell">' . $i . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["curp"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["nombres"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["apellido_paterno"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["apellido_materno"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["telefono"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["fecha_inicio"]) . '</div>';
        echo '<div class="div-table-cell">';
        echo '<button value="' . utf8_encode($registro["curp"])
        . '" class="btn btn-success" onclick="busquedaSelectiva(this)"'
        . ' >'
        . '<i class="zmdi zmdi-book" ></i>&nbsp;&nbsp;Detalle</button>';
        echo '</div>';

        if ($rol == 2) {
            echo '<div class="div-table-cell">';
            echo '<button value="' . utf8_encode($registro["curp"])
            . '" class="btn btn-info" onclick="updateAsesor(this)"'
            . ' data-toggle="modal" data-target="#updateAsesor">'
            . '<i class="zmdi zmdi-refresh" ></i></button>';
            echo '</div>';
        }
        if ($rol == 3) {
            echo '<div class="div-table-cell">';
            echo '<button value="' . utf8_encode($registro["curp"])
            . '" class="btn btn-primary" onclick="updateProspecto(this)"'
            . ' data-toggle="modal" data-target="#updateProspecto">'
            . '<i class="zmdi zmdi-edit" ></i></button>';
            echo '</div>';
        }
        echo '</div>';
        $i++;
    }
    echo '</div>';
    echo '</div>';
    $sql0 = "SELECT * FROM prospeccion p
        INNER JOIN detalle_prospeccion d ON p.curp = d.curp
        where  (CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) 
        like '%$valor%' or p.curp like '%$valor%');";
    if ($rol == "1") {
        $sql0 = "SELECT * FROM prospeccion p
        INNER JOIN detalle_prospeccion d ON p.curp = d.curp
        where d.nom_usu='$usuario' and (CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) 
        like '%$valor%' or p.curp like '%$valor%');";
    }

    $ejecutar_consulta = $conexion->query(utf8_decode($sql0));
    $num_regs0 = $ejecutar_consulta->num_rows;
    $PagUlt = $num_regs0 / $RegistrosAMostrar;
    $Res = $num_regs0 % $RegistrosAMostrar;
    if ($Res > 0) {
        $PagUlt = floor($PagUlt) + 1;
    }
    echo '<div class="text-center col-md-12">';
    echo "<button class='btn btn_link' onclick=\"listarProspectos('$valor','0')\">Primero</button> ";
    if ($PagAct > 1) {
        echo "<button class='btn btn_link' onclick=\"listarProspectos('$valor','$PagAnt')\"><<</button> ";
    }
    echo "<strong>Pagina " . $PagAct . "/" . $PagUlt . "</strong>";
    if ($PagAct < $PagUlt) {
        echo " <button class='btn btn_link' onclick=\"listarProspectos('$valor','$PagSig')\">>></button> ";
    }
    echo "<button class='btn btn_link' onclick=\"listarProspectos('$valor','$PagUlt')\">Ultimo</button>";
    echo '</div>';
}


/*
$PagAnt = (int)$PagAct - 1;
$PagSig = (int)$PagAct + 1;
$PagUlt = $num_regs / $RegistrosAMostrar;
$Res = $num_regs % $RegistrosAMostrar;

if ($Res > 0) {
    $PagUlt = floor($PagUlt) + 1;
}
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if ($PagAct > 1) {
    echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
}
$tem = 10;
$i   = 1;
if ($PagAct > 5) {
    $i   = $PagAct - 5;
    $tem = $PagAct + 5;
}

for ($i; $i < $tem; $i++) {
    if ($i == $PagAct) {
        echo "<a onclick=\"listarProspectos('$valor','$PagUlt')\"><strong>" . $i . "</strong></a> ";
    } else {
        echo " <a onclick=\"listarProspectos('$valor','$PagUlt')\">" . $i . "</a> ";
    }
}
echo "<strong>Pagina " . $PagAct . "/" . $PagUlt . "</strong>";
if ($PagAct < $PagUlt) {
    echo " <a onclick=\"listarProspectos('$valor','$PagUlt')\">Siguiente</a> ";
}

echo "<a onclick=\"listarProspectos('$valor','$PagUlt')\">Ultimo</a>";*/
