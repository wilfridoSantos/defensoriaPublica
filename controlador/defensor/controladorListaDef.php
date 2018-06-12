<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    $contenido = json_encode($listaDef);

    if(isset($_GET['term'])){//muestro todo los usuario para las busquedas del defensor

           echo $contenido;
       }
?>