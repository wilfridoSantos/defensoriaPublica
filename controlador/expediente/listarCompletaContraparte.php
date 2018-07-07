<?php 
  //  header('Content-Type: application/json');
    //include '../../modelo/personal.php';    
    include '../../modelo/contraparte.php';
   $listaContraparte= listar_contraparte();

  $contrapartesByExpediente= getContrapartesById($_GET['id_expediente']);
    echo json_encode($contrapartesByExpediente);
   
       
     
    
      
      
?>