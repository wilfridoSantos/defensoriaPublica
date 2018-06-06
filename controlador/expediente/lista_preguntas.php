<?php
    include_once('../../modelo/expediente.php');
    //header('Content-Type: application/json');
//    include_once('../../modelo/detalleExpediente_usuarioServicio.php');
 
  // print_r(listar_preguntaConOpciones(9));
  
  // $user = json_decode($contenido);
  if(isset($_GET['conOpcion']))  {
   $user = listar_preguntaConOpciones(9);
    $pregunta = Array( );
    $equals="";
    foreach($user as $values){
    
        // print_r($values['pregunta']); 
    // print_r( $values);
        if($values['id_pregunta']!=$equals){
            $equals=$values['id_pregunta'];
            $valor =Array();
            $valorOpcion =Array();
            $valor['id_pregunta']=$values['id_pregunta'];
            $valor['pregunta']=$values['pregunta'];
            $valor['identificador']=$values['identificador'];
            $valor['opcion']="";
        }
    
        if($values['opcion']=="")
        $valorOpcion="";
        else
        array_push($valorOpcion, $values['opcion']);
    
        $valor['opcion']=$valorOpcion;
    
    //    array_push($pregunta,$valor);  
    $pregunta[$values['id_pregunta']]=$valor;  
    }
    echo json_encode($pregunta);
}
if(isset($_GET['preguntas'])){
    echo json_encode(listar_pregunta(9));
}
//echo "hola desde el controlador de preguntas";
//print_r($pregunta);
?>