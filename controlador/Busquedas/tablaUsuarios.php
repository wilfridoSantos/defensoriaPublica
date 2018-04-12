<?php

include "../conexion.php";
$val = $_POST['valor'];
$usuario = $_POST["usuario"];
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
$sql = "";
if ($usuario == 3) {
    $sql = "SELECT u.nom_usu, u.nombres_usu,u.ape_paterno_usu,"
            . " u.estatus,u.ape_materno_usu,u.correo_usu," .
            "u.telefono_usu ,p.tipo_perfil from usuario u
                INNER JOIN perfil p on u.id_perfil = p.id_perfil
                where u.id_perfil !='4' and (CONCAT(u.nombres_usu,
                ' ',u.ape_paterno_usu,' ',u.ape_materno_usu)
                like '%$val%' ) and estatus != '3' limit $RegistrosAEmpezar,$RegistrosAMostrar";
}
if ($usuario == 2) {
    $sql = "select u.nom_usu, u.nombres_usu,u.ape_paterno_usu,"
            . " u.estatus,u.ape_materno_usu,u.correo_usu," .
            "u.telefono_usu ,p.tipo_perfil from usuario u INNER JOIN "
            . "perfil p on u.id_perfil = p.id_perfil where u.id_perfil =1 and "
            . "(CONCAT(nombres_usu,' ' ,ape_paterno_usu,' ',ape_materno_usu)"
            . " like '%$val%' or u.nom_usu like'%$val%') and estatus != '3' limit $RegistrosAEmpezar,$RegistrosAMostrar";
}
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs > 0) {
    echo '<div class="container-fluid">';
    echo '<div class="div-table">';
    echo '<div class="div-table-row div-table-head">';
    echo '<div class="div-table-cell">#</div>';
    echo '<div class="div-table-cell">Usuario</div>';
    echo '<div class="div-table-cell">Nombre</div>';
    echo '<div class="div-table-cell">Apellido Paterno</div>';
    echo '<div class="div-table-cell">Apellido Materno</div>';
    echo '<div class="div-table-cell">Correo</div>';
    echo '<div class="div-table-cell">Telefono</div>';
    echo '<div class="div-table-cell">Cargo</div>';
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
        . utf8_encode($registro["nom_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["nombres_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["ape_paterno_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["ape_materno_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["correo_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["telefono_usu"]) . '</div>';
        echo '<div class="div-table-cell">'
        . utf8_encode($registro["tipo_perfil"]) . '</div>';
        echo '<div class="div-table-cell"><button id="'
        . utf8_encode($registro["nom_usu"]) .
        '" onclick="bloquearP(this,' . utf8_encode($registro["estatus"])
        . ' ,' . $PagAct . ')" value="' . utf8_encode($registro["nom_usu"]) .
        '" type="submit" class="btn btn-info tooltips-general" '
        . 'data-toggle="tooltip" data-placement="top" title="' .
        $place . '"><i class="zmdi ' . $tipo . '"></i></button></div>';
        echo '<div class="div-table-cell">';
        echo '<button value="' . utf8_encode($registro["nom_usu"])
        . '" class="btn btn-success" onclick="editUser(this)" '
        . 'data-toggle="modal" data-target="#editarUsuario">'
        . '<i class="zmdi zmdi-edit" ></i></button>';
        echo '</div>';
        echo '<div class="div-table-cell">';
        echo '<button value ="' . utf8_encode($registro["nom_usu"])
        . '" class="btn btn-danger" onclick="deleteUsuario(this,' . $PagAct . ')"'
        . ' data-toggle="modal" data-target="#eliminarusuario">'
        . '<i class="zmdi zmdi-delete"></i></button>';
        echo '</div>';
        echo '</div>';
        $i++;
    }
    echo '</div>';
    echo '</div>';
    if ($usuario == 2) {
        $sql0 = "select nom_usu from usuario "
                . " where id_perfil =1 and "
                . "(CONCAT(nombres_usu,' ' ,ape_paterno_usu,' ',ape_materno_usu)"
                . " like '%$val%' or nom_usu like'%$val%')";
    } else {
        $sql0 = "select nom_usu from usuario";
    }

    $ejecutar_consulta = $conexion->query(utf8_decode($sql0));
    $num_regs0 = $ejecutar_consulta->num_rows;
    $PagUlt = $num_regs0 / $RegistrosAMostrar;
    $Res = $num_regs0 % $RegistrosAMostrar;
    if ($Res > 0) {
        $PagUlt = floor($PagUlt) + 1;
    }
    echo '<div class="text-center col-md-12">';
    echo "<button class='btn btn_link' onclick=\"buscarUsuario('$val','0')\">Primero</button> ";
    if ($PagAct > 1) {
        echo "<button class='btn btn_link' onclick=\"buscarUsuario('$val','$PagAnt')\"><<</button> ";
    }
    echo "<strong>Pagina " . $PagAct . "/" . $PagUlt . "</strong>";
    if ($PagAct < $PagUlt) {
        echo " <button class='btn btn_link' onclick=\"buscarUsuario('$val','$PagSig')\">>></button> ";
    }
    echo "<button class='btn btn_link' onclick=\"buscarUsuario('$val','$PagUlt')\">Ultimo</button>";
    echo '</div>';
} else {
    echo '<div class="text-center">';
    echo '<h3>ho hay resultado para esa busqueda</h3>';
    echo '</div>';
}