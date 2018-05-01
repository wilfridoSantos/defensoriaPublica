<?php 
  //  header('Content-Type: application/json');
    include '../../modelo/juzgado.php';
    include '../../modelo/defensor/defensor.php';
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
 
    $valor[]=$arrayJuzgado;
   
    $juzgado[$values->region]=$valor;
   }
  $contenidojuzgado = json_encode($juzgado);
   

  $mensaje="Registro exitoso";


if(isset($_POST['nue'])){
  $nue=$_POST['nue'];
  $juzgado=$_POST['adscripcion'];
  $defensor=  listar_defensor_x_nue($nue);
  if($defensor==0){ 
    $mensaje="no existe defensor con el nue ".$nue;
   }  

   $mensaje=" cambio de adscripcion exitoso";
//   print_r($defensor[0]['id_defensor']);
   actualizar_juzgado($juzgado,$defensor[0]['id_defensor']);
  //print_r($defensor);
 // actualizar_juzgado($nue);
//echo "fdsfefe";
//echo "<script>alert('fdfe')</script>";
//echo json_encode($defensor);
}


if(isset($_GET['tipo'])){
        
if($_GET['tipo']=="html"){
     
    session_start();
     $_SESSION['mensaje'] = "registro exitoso";
     $_SESSION['mensaje'] = $mensaje;

    header("location: ../../vistas/coordinador/index.php");
 }
 else{
      header('Content-Type: application/json');
     echo "json";
 }
}
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