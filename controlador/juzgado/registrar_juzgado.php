<?php 
   
    include '../../modelo/juzgado.php';

    
      $juzgado = Array(
           
            "juzgado"       =>$_POST['juzgado'],
            "region"        =>$_POST['region'],
            "calle"         =>$_POST['calle'],
            "numero_ext"    =>$_POST['numero'],
            "numero_int"    =>" ",
            "municipio"     =>$_POST['municipio'],                
            "cp"            =>$_POST['cp'],
            "num_telefono"  =>$_POST['telefono'],
            "colonia"       =>$_POST['colonia']
        );

       
      crear_juzgado($juzgado);
       
        if(!isset($_GET['tipo'])){
         
           session_start();
           $mensaje=['tipo'=>"exito",
           'mensaje'=>"registro existoso"];
          $_SESSION['mensaje'] = $mensaje;
            header("location: ../../vistas/administrador/index.php?dirigir='registrar_defensor'");
        }
        else{
             header('Content-Type: application/json');
            echo "json";
        }
       

?>