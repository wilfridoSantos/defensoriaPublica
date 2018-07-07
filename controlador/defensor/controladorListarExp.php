<?php 
    include_once('../../modelo/defensor/defensor.php');
    include_once('../../modelo/expediente.php');
 
    include_once('../../modelo/respuesta/respuesta.php');
    
  
   

    $listaExpedientes = listar_expedientes();
    $contenido = json_encode($listaExpedientes);
 //echo $_GET['idPersonal'];
   if(isset($_GET['idPersonal'])){ 
          $misExpedietnesDefensor=json_encode(listar_expediente_x_defensor($_GET['idPersonal']));
          echo $misExpedietnesDefensor;
        }


   if(isset($_GET['xpregunta'])){ 
         // $misExpedietnesDefensor=json_encode(listar_expediente_x_defensor($_GET['idPersonal']));
          $misExpedietnesDefensor=listar_expediente_x_defensor($_GET['id_defensor']);

          foreach ($misExpedietnesDefensor as $key => $value) {
           $pregunta=  respuestaPregunta($value['id_expediente']);
           $misExpedietnesDefensor[$key]['observaciones']=$pregunta[sizeof($pregunta)-1]['observaciones'];
              
            }
            echo json_encode($misExpedietnesDefensor);
         // $listaRespuestaPregunta= respuestaPregunta($_GET['id_expediente']);
          // echo $_GET['id_expediente'];
          // echo json_encode($listaRespuestaPregunta);

          //echo $misExpedietnesDefensor;
        }
?>