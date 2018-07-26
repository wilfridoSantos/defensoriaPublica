<?php 
include_once('../../libreria/conexion.php');

function getMateriaBySistema($sis){
    $sql="select distinct materia from materia where sistema='".$sis."'";
    return consulta($sql);
}
function getMaterias(){
    $sql="select materia, sistema from materia";
    return consulta($sql);
}
?>
