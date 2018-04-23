<?php 
    header('Content-Type: application/json');
    include '../../modelo/juzgado.php';

    
      $juzgado = Array(
           
            "juzgado"       =>$_POST['juzgado'],
            "region"        =>$_POST['region'],
            "calle"         =>$_POST['calle'],
            "numero_ext"    =>" ",
            "numero_int"    =>" ",
            "municipio"     =>$_POST['municipio'],                
            "cp"            =>" ",
            "num_telefono"  =>" "
        );

        crear_juzgado($juzgado);
        /*
        if(!actualiza_egresado($egresado)){
            echo "ERROR";
        }*/
//$var=listar_juzgado_x_id(1);
   
       
    
 //  $contenido = json_encode($var);
 // print_r($contenido);
 
      //  $json=json_encode($arrayDef);
        //print_r(  json_decode($json,true));
    //    echo json_encode($arrayDef);
    

?>