<?php 
include_once('../../libreria/conexion.php');

function getMateriaBySistema($sis){
    $sql="select distinct materia from materia where sistema='".$sis."'";
    return consulta($sql);
}
function getMaterias(){
    $sql="select distinct materia from materia";
    return consulta($sql);
}
function getRegionBySistema($sis){
    $sql="select distinct region from juzgado
                     inner join (
                              select * from
                                  personal_campo as pc inner join
                                  materia as ma using(id_materia)
                                )as tablaPer using(id_juzgado)
           where tablaPer.sistema='".$sis."'";
    return consulta($sql);
}
function getMatRegion($sis){
    $lista = Array();
    $lista['materia'] = getMateriaBySistema($sis);
    $lista['region'] = getRegionBySistema($sis);
    return $lista;
}
?>
