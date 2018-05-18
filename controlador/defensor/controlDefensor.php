<?php 
    
    include '../../modelo/defensor/defensor.php';
    
    if(isset($_GET['id_personal'])){
        $id_def = $_GET['id_personal'];
        $defensorX = getDefensorById($id_def);//obtenerDefensorCedula($cedulaProf);
        $defensorZ = json_encode($defensorX);
        echo $defensorZ;
    }



    ////carga el defensor por materia
    if(isset($_GET["materia"])){   
      $materia=$_GET["materia"];
      
      $defensorPormateria= getDefensorPorMateria($materia);
      echo json_encode($defensorPormateria);
    }

    ////carga el personal_campo por juzgado
    if(isset($_GET["id_personal"])){   
        $id_personal=$_GET["id_personal"];
        //echo "el idpersonal es igual a ".$id_personal;
        $defensorPorJuzgado= getDefensorPorJuzgado($id_personal);
        echo json_encode($defensorPorJuzgado);
        
      }

?>