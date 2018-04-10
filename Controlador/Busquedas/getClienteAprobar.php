<?php
include '../conexion.php';
$sql="SELECT p.curp,p.nombres,p.apellido_paterno,p.apellido_materno,c.id_contrato FROM contrato c 
inner JOIN prospeccion p on c.prospecto = p.curp 
INNER JOIN detalle_prospeccion d  on c.prospecto = d.curp 
inner join usuario u on d.nom_usu= u.nom_usu 
where c.estado_contrato='0' or c.estado_contrato='1'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
$i=1;
if($num_regs>0){
    echo '<div class="div-table-row div-table-head">';
    echo '<div class="div-table-cell">#</div>';
    echo '<div class="div-table-cell">Código</div>';
    echo '<div class="div-table-cell">Nombre</div>';
    echo '<div class="div-table-cell">Apellido Paterno</div>';
    echo '<div class="div-table-cell">Apellido Materno</div>';
    echo '<div class="div-table-cell">Contrato</div>';
    echo '<div class="div-table-cell">Detalle</div>';
    echo '</div>';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        echo '<div class="div-table-row">';
        echo '<div class="div-table-cell">' . $i . '</div>';
        echo '<div class="div-table-cell">' . utf8_encode($registro["curp"]) . '</div>';
        echo '<div class="div-table-cell">' . utf8_encode($registro["nombres"]) . '</div>';
        echo '<div class="div-table-cell">' . utf8_encode($registro["apellido_paterno"]) . '</div>';
        echo '<div class="div-table-cell">' . utf8_encode($registro["apellido_materno"]) . '</div>';
        echo '<div class="div-table-cell">';
        echo '<button value="' . utf8_encode($registro["id_contrato"])
        . '" class="btn btn-success"'
        . ' data-toggle="modal" data-target="#contrato" onclick="cargarDatosContrato(this)">'
        . '<i class="zmdi zmdi-book" ></i>&nbsp;&nbsp;Contrato</button>';
        echo '</div>';
        
        echo '<div class="div-table-cell">';
        echo '<button value="' . utf8_encode($registro["curp"])
        . '" class="btn btn-warning" onclick="busquedaSelectiva(this)"'
        . ' data-toggle="modal" data-target=".bd-example-modal-lg">'
        . '<i class="zmdi zmdi-book" ></i>&nbsp;&nbsp;Detalle</button>';
        echo '</div>';
        echo '</div>';
        $i++;
    }
    echo '</div>';
}else{
    echo '<div class="text-center">';
    echo '<h3>Por el momento no hay clientes</h3>';
    echo '</div>';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

