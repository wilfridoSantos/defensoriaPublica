<?php
    include_once('../../modelo/expediente.php');
    //header('Content-Type: application/json');

  if(isset($_GET['conOpcion']))  {
//   $user = listar_preguntaConOpciones(9);
   $user = listar_preguntaConOpciones($_GET['id_materia'],$_GET['id_expediente']);
   //echo $_GET['id_materia'];
   

   //foreach($user as $valor){
    $newUser=array_filter($user, "noConstestadas");//FILTRO A TODO LOS QUE NO TIENEN RESPUESTA
   //}
   
   $pregunta = Array( );
    $equals="";
    foreach($newUser as $values){    
        // print_r($values['pregunta']); 
    // print_r( $values);
        if($values['id_pregunta_materia']!=$equals){
            $equals=$values['id_pregunta_materia'];
            $valor =Array();
            $valorOpcion =Array();
            $valor['id_pregunta']=$values['id_pregunta'];
            $valor['id_pregunta_materia']=$values['id_pregunta_materia'];
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
    $pregunta[$values['id_pregunta_materia']]=$valor;  
    }
    echo json_encode($pregunta);
}

if(isset($_GET['preguntas'])){//ESTE ERA SOLO PARA CUANDO SE REQUERIA LAS PREGUNTAS SIN LAS OPCIONES
    //echo json_encode(listar_pregunta(9));
    echo json_encode(listar_pregunta($_GET['id_materia']));
}
//echo "hola desde el controlador de preguntas";
//print_r($pregunta);



function noConstestadas($var){
     return ($var['respuesta']=="");
   } 
?>