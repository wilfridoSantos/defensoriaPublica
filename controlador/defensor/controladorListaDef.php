<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    $num_regs = count($listaDef);//$listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
    }else{
      // print_r($listaDef);
        $contenido = json_encode($listaDef);
       // print_r($listaDef);
       // print_r($listaDef);
    }




    //if(isset($_POST['materia'])){
/*       foreach($listaDef as $obj=>$valores){
       //print_r($valores);
            // echo '<option value='.$valores['nombre'].'>'.$valores['nombre'].'</option> ';
            
       $filtradoMateria=array_filter($valores, function($v, $k) {
        return $k;
       }) ;
      }
       print_r($filtradoMateria); */
      
    //}

?>