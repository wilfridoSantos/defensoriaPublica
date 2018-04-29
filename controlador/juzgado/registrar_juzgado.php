<?php 
   
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
       
        if(!isset($_GET['tipo'])){
         
           session_start();
            $_SESSION['mensaje'] = "registro exitoso";
            header("location: ../../vistas/coordinador/index.php?dirigir='registrar_defensor'");
        }
        else{
             header('Content-Type: application/json');
            echo "json";
        }
       

?>