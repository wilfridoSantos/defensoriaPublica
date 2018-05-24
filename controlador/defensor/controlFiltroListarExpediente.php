<?php
include_once('../../modelo/defensor/defensor.php');
$q = intval($_GET['q']);
switch($q){
    case 1:
    $lista_activos = listar_expedientes_activos();
    $encode = json_encode($lista_activos);
    echo $encode;
    break;
    case 2:
    $lista_inactivos = listar_expedientes_inactivos();
    $encode = json_encode($lista_inactivos);
    echo $encode;
    break;
    case 3:
    $lista_completa = listar_expedientes();
    $encode = json_encode($lista_completa);
    echo $encode;
    //print_r( $lista_completa);
    break;
}
?>