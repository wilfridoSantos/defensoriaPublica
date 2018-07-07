<?php 
  //  header('Content-Type: application/json');
    //include '../../modelo/personal.php';    
    include '../../modelo/contraparte.php';
   $listaContraparteEditar= getContraparteById($_GET['id_contraparte']);

    echo json_encode($listaContraparteEditar);
   
       
     
    
      
      
?>