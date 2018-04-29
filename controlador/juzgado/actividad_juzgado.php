<?php 
  //  header('Content-Type: application/json');
    include '../../modelo/juzgado.php';
    
    $listaJuzgado =   listar_juzgado();
    $equals="";
    $contenido = json_encode($listaJuzgado);
    
    $user = json_decode($contenido);
    
   
   $juzgado = Array( );
  
   foreach($user as $values){
    if($values->region!=$equals){
        $equals=$values->region;
        $valor =Array();
    }
    
    $arrayJuzgado=Array();
    $arrayJuzgado['id_juzgado']=$values->id_juzgado;
    $arrayJuzgado['nombre']=$values->juzgado;
   /* $valor[]=$values->id_juzgado;
    $valor[]=$values->juzgado;*/
    $valor[]=$arrayJuzgado;
   
    $juzgado[$values->region]=$valor;
   }
  $contenidojuzgado = json_encode($juzgado);
     //   print_r($contenidojuzgado);
         
/*$user = json_decode($contenidojuzgado);
foreach($user as $values=>$key)
{
     print_r($values);
 foreach($key as $valor)
{
     echo $valor;
      print_r($valor);
 // echo "<br>";
}    
   
  
}*/   

   // print_r(json_decode($contenidojuzgado));

?>