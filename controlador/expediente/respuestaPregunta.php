<?php 
  //  header('Content-Type: application/json');
    //include '../../modelo/personal.php';    
    include '../../modelo/respuesta/respuesta.php';
    
    $listaRespuestaPregunta= respuestaPregunta($_GET['id_expediente']);
   // echo $_GET['id_expediente'];
    echo json_encode($listaRespuestaPregunta);
   
       
     
    
      
      
?>