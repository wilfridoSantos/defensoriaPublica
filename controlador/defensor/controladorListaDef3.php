<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    $contenido = json_encode($listaDef);

    if(isset($_GET['term'])){//muestro todo los usuario para las busquedas del defensor
        if(isset($_GET['sistema'])){
            switch($_GET['sistema']){
                case'ALL':                    
                    $listaDef = listar_defensores();
                    $contenido = json_encode($listaDef);                    
                   echo $contenido;
                    //print_r($_GET['region'].' ==== '.$_GET['materia']);
                break;
                default:
                    $listaDef = listar_defensoresSis($_GET['sistema']);
                    $contenido = json_encode($listaDef);
                    
                    //print_r($_GET['region'].' ==== '.$_GET['materia'].'===='.$_GET['sistema']);
                    echo $contenido;
                break;
            }
        }
           
       }
?>