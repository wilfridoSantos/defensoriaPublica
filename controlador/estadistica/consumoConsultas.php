<?php 
   

   

header('Content-Type: application/json');
 if(isset($_GET['consultaPor'])) 
 if($_GET['consultaPor']=="defensor"){
    include_once('../../controlador/estadistica/consultaDefensor.php');
    tipoconstructor($_GET['defensor'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $pordefensor = getRespuesta();
    echo json_encode($pordefensor);
}

 if($_GET['consultaPor']=="sistema"){
     include_once('../../controlador/estadistica/consultaSistema.php');
    constructorSistema($_GET['sistema'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $pordefensor = getRespuestaSistema();
    echo json_encode($pordefensor); 
}
 if($_GET['consultaPor']=="materia"){
    include_once('../../controlador/estadistica/consultaMateria.php');
    constructorMateria($_GET['materia'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $pordefensor = getRespuestaMateria();
    echo json_encode($pordefensor);

}

if($_GET['consultaPor']=="sistemaMateria"){
    include_once('../../controlador/estadistica/consultaSistemaMateria.php');
    constructorSistemaMateria($_GET['sistema'],$_GET['materia'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $porsistemaMateria = getRespuestaSistemaMateria();
     //print_r($porsistemaMateria);
     echo json_encode($porsistemaMateria);
  
}
if($_GET['consultaPor']=="regionSistemaMateria"){
    include_once('../../controlador/estadistica/consultaRegionSistemaMateria.php');
    tipoconstructorRegionSistemaMateria($_GET['region'],$_GET['sistema'],$_GET['materia'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $porRegionSistemaMateria = getRespuestaRegionSistemaMateria();
     //print_r($porsistemaMateria);
        echo json_encode($porRegionSistemaMateria);
  
}
  
/* function getSistema(){
    include_once('../../controlador/estadistica/consultaSistema.php');
    //constructorSistema($_GET['sistema'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    //$pordefensor = getRespuestaSistema();
    //return json_encode($pordefensor);
}
function getMateria(){
    include_once('../../controlador/estadistica/consultaMateria.php');
    constructorMateria($_GET['materia'],$_GET['fechaInicio'],$_GET['fechaFinal']);
    $pordefensor = getRespuestaMateria();
    echo json_encode($pordefensor);
} */
?>