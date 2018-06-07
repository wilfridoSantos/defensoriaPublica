<?php
    include '../../modelo/actividad.php';  

    
    if(isset($_GET['q'])){
        $q = $_GET['q'];
        switch ($q){
            case 1: //asesoria
                $lista = getActividadesAsesorias();
                $encode = json_encode($lista);
                echo $encode; 
            break;
            case 2: //audiencia
                $lista = getActividadesAudiencias();
                $encode = json_encode($lista);
                echo $encode; 
            break;
            case 3: //visita carcelaria
                $lista = getActividadesVisitas();
                $encode = json_encode($lista);
                echo $encode; 
            break;
            case 4: //todos                              
                $lista = getActividades();
                $encode = json_encode($lista);
                echo $encode; 
            break;
        }
        
    }
    
?>