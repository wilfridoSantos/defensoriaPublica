<?php 
    header('Content-Type: application/json');
    include_once ('../../modelo/expediente.php');
    $numExp = $_GET['numExp'];
    $detalleExpediente = getExpedienteByNum($numExp);
    $id_materia=$detalleExpediente[0]['id_materia'];
   // print_r($id_materia);
    
   $preguntasCompletaSobreMateria = listar_pregunta($id_materia);
   $arrayIdPregunta=Array();
foreach ($preguntasCompletaSobreMateria as $key => $value) {
    $arrayIdPregunta[]=$value['id_pregunta'];
}

//print_r($arrayIdPregunta[0]);
//print_r($detalleExpediente);
  /* $array=array_filter($arrayIdPregunta,function($x) use ($detalleExpediente){
  //  print_r($detalleExpediente);
     foreach ($detalleExpediente as $llave => $valor) {
            return ($valor['id_pregunta']==$x);    
         }
   
});
 print_r($array); */
/* return array_filter($array,function($respuesta) use ($opcion){
    return ($respuesta['respuesta']==$opcion);      
   });  */

   // echo $detalleExpediente;
    $encode = json_encode($detalleExpediente);
$respuesta=Array(
    'respuestas'=>$detalleExpediente,
    'preguntas'=>$preguntasCompletaSobreMateria,
    'totalPreguntas'=>count($preguntasCompletaSobreMateria),
    'totalRespuestas'=>count($detalleExpediente),
);

   // print_r($encode);
echo json_encode($respuesta); 
?>