<?php 
    //header('Content-Type: application/json');
    include_once('../../modelo/defensor/defensor.php');
    
      $defensor = Array(
            "id_personal"    =>$_POST['id_personal'],
            "nombre"         =>$_POST['nombre'],
            "ap_paterno"     =>$_POST['ap_paterno'],
            "ap_materno"     =>$_POST['ap_materno'],
            "curp"           =>$_POST['curp'],
            "calle"          =>$_POST['calle'],
            "numero_ext"     =>$_POST['numero_ext'],    
            "numero_int"     =>$_POST['numero_int'],
            "colonia"        =>$_POST['colonia'],
            "municipio"      =>$_POST['municipio'],
            "nup"            =>$_POST['nup'],
            "nue"            =>$_POST['nue'],
            "genero"         =>$_POST['genero'],
            "telefono"       =>$_POST['telefono'],
            "corre_electronico" =>$_POST['corre_electronico']
        );        
        $actualizaDefensor = actualiza_defensor($defensor);
        //print_r($actualizaDefensor);      
        if(!isset($_GET['tipo'])){
           session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
          //return 200; // 
          header("location: ../../vistas/administrador/");
       }
       else{
           echo "json";
       }
?>
