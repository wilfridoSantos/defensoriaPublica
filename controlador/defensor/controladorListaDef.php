<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    $contenido = json_encode($listaDef);

    if(isset($_GET['term'])){
        if(isset($_GET['sistema']) && isset($_GET['materia'])){
            switch($_GET['sistema']){
                case'ALL':
                    $listaDef = listar_defensoresMateria($_GET['materia']);
                    $contenido = json_encode($listaDef);
                    echo $contenido;
                break;
                case 'TRADICIONAL' || 'ORAL':
                    $listaDef = listar_defensoresSisMat($_GET['sistema'],$_GET['materia']);
                    $contenido = json_encode($listaDef);
                    echo $contenido;
                break;
            }
        }
        if(isset($_GET['sistema']) && isset($_GET['region'])){
                switch($_GET['sistema']){
                    case'ALL':
                        $listaDef = listar_defensoresRegion($_GET['region']);
                        $contenido = json_encode($listaDef);
                        echo $contenido;
                    break;
                    case 'TRADICIONAL' || 'ORAL':
                        $listaDef = listar_defensoresSisReg($_GET['sistema'],$_GET['region']);
                        $contenido = json_encode($listaDef);
                        echo $contenido;
                    break;
                }
            }
            if(isset($_GET['sistema']) && !isset($_GET['region']) && !isset($_GET['materia'])){
                switch($_GET['sistema']){
                    case'ALL':
                        $listaDef = listar_defensores();
                        $contenido = json_encode($listaDef);
                        echo $contenido;
                    break;
                    case 'TRADICIONAL' || 'ORAL':
                        $listaDef = listar_defensoresSis($_GET['sistema']);
                        $contenido = json_encode($listaDef);
                        echo $contenido;
                    break;
                }
            }
            echo $contenido;
    }else{
            
    }
?>