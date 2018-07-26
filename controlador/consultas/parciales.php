<?php 
    include '../../modelo/consulta/consultas.php';    
    if(isset($_POST['filtro'])){
        if($_POST['filtro'] == 'AMBAS'){
            $mat = getMaterias();
            echo json_encode($mat);
            
        }else{
            $mat = getMateriaBySistema($_POST['filtro']);
            echo json_encode($mat);        
        }
    }else {
        

    }
?>
