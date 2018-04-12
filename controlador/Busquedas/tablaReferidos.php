<?php

include "../conexion.php";
$val = $_POST['valor'];
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
$sql = "SELECT * from referidos where CONCAT
            (nombre_referido,' ',apellido_paterno_referido,' ',apellido_materno_referido)
            like '%$val%' and estatus != 3 limit $RegistrosAEmpezar,$RegistrosAMostrar";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs > 0) {
    echo '<div class="container-fluid">';
    echo '<div class="div-table">';
    echo '<div class="div-table-row div-table-head">';
    echo '<div class="div-table-cell">#</div>';
    echo '<div class="div-table-cell">Nombre</div>';
    echo '<div class="div-table-cell">Apellido Paterno</div>';
    echo '<div class="div-table-cell">Apellido Materno</div>';
    echo '<div class="div-table-cell">Departamento</div>';
    echo '<div class="div-table-cell">Estado</div>';
    echo '<div class="div-table-cell">Actualizar</div>';
    echo '<div class="div-table-cell">Eliminar</div>';
    echo '</div>';
    $i = $RegistrosAEmpezar + 1;
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $place;
        $tipo;
        if (utf8_encode($registro["estatus"]) == "1") {
            $place = "Cuenta Activada, pulsa el botón para Desactivarla";
            $tipo = "zmdi-swap";
        } else {
            $place = "Cuenta Desactivada, pulsa el botón para Activarla";
            $tipo = "zmdi-block";
        }
        echo '<div class="div-table-row">';
        echo '<div class="div-table-cell">' . $i . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["nombre_referido"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["apellido_paterno_referido"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["apellido_materno_referido"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["departamento"]) . '</div>';
        echo '<div class="div-table-cell"><button id="'
        . utf8_encode($registro["id_referido"]) .
        '" onclick="bloquearReferido(this,' . utf8_encode($registro["estatus"])
        . ' ,' . $PagAct . ')" value="' . utf8_encode($registro["id_referido"]) .
        '" type="submit" class="btn btn-info tooltips-general" '
        . 'data-toggle="tooltip" data-placement="top" title="' .
        $place . '"><i class="zmdi ' . $tipo . '"></i></button></div>';
        echo '<div class="div-table-cell">';
        echo '<button value="' . utf8_encode($registro["id_referido"])
        . '" class="btn btn-success" onclick="editReferido(this)" '
        . 'data-toggle="modal" data-target="#editarReferido">'
        . '<i class="zmdi zmdi-edit" ></i></button>';
        echo '</div>';
        echo '<div class="div-table-cell">';
        echo '<button value ="' . utf8_encode($registro["id_referido"])
        . '" class="btn btn-danger" onClick=\'javascript:deleteReferido(this,"' . utf8_encode($registro["nombre_referido"]) . '","' . $PagAct . '")\''
        . ' data-toggle="modal" data-target="#eliminarCatalogo">'
        . '<i class="zmdi zmdi-delete"></i></button>';
        echo '</div>';
        echo '</div>';
        $i++;
    }
    echo '</div>';
    echo '</div>';
    $sql0 = "SELECT * from referidos where CONCAT
            (nombre_referido,' ',apellido_paterno_referido,' ',apellido_materno_referido)
            like '%$val%'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql0));
    $num_regs0 = $ejecutar_consulta->num_rows;
    $PagUlt = $num_regs0 / $RegistrosAMostrar;
    $Res = $num_regs0 % $RegistrosAMostrar;
    if ($Res > 0) {
        $PagUlt = floor($PagUlt) + 1;
    }
    echo '<div class="text-center col-md-12">';
    echo "<button class='btn btn_link' onclick=\"buscarReferido('$val','0')\">Primero</button> ";
    if ($PagAct > 1) {
        echo "<button class='btn btn_link' onclick=\"buscarReferido('$val','$PagAnt')\"><<</button> ";
    }
    echo "<strong>Pagina " . $PagAct . "/" . $PagUlt . "</strong>";
    if ($PagAct < $PagUlt) {
        echo " <button class='btn btn_link' onclick=\"buscarReferido('$val','$PagSig')\">>></button> ";
    }
    echo "<button class='btn btn_link' onclick=\"buscarReferido('$val','$PagUlt')\">Ultimo</button>";
    echo '</div>';
} else {
    echo '<div class="text-center">';
    echo '<h3>ho hay resultado para esa busqueda</h3>';
    echo '</div>';
}