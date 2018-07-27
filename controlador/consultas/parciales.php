<?php 
    include '../../modelo/consulta/consultas.php';    
    if(isset($_POST['filtro'])){
        if($_POST['sistema'] == "ALL"){
            $mat = getMaterias();
            echo json_encode($mat);
        }else{
            if($_POST['filtro'] == 'AMBAS'){
                $sis = $_POST['sistema'];
                $mat = getMatRegion($sis);
                echo json_encode($mat);
                
            }
            if($_POST['filtro'] == 'MATERIA'){
                $sis = $_POST['sistema'];
                $mat = getMateriaBySistema($sis);
                echo json_encode($mat);            
            }
            if($_POST['filtro'] == 'REGION'){
                $sis = $_POST['sistema'];
                $mat = getRegionBySistema($sis);
                echo json_encode($mat);            
            }  
        } 
    }else {
        

    }
?>
