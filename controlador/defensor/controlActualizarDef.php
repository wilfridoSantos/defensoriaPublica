<?php 
    include '../../modelo/defensor/defensor.php';

   if($_FILES['fileToUpload']['size'] != 0){
        $nombreFoto = $_FILES["fileToUpload"]["name"];
        $rutaFoto   = $_FILES["fileToUpload"]["tmp_name"];
        $carpeta='../../recursos/uploads/';
        
        if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
        }
         
        $destino = $carpeta.basename($nombreFoto);
        move_uploaded_file($rutaFoto,$destino);
    }else{        
        $nombreFoto = $_POST['imagen'];
    }
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
                "telefono"       =>$_POST['telefono'],
                "correo_electronico" =>$_POST['correo_electronico'],
                "foto"          => $nombreFoto
            );        
        $actualizaDefensor = actualiza_defensor($defensor);
        //print_r($actualizaDefensor);      
        if(!isset($_GET['tipo'])){
           session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
          //return 200; // 
         header("location: ../../vistas/administrador/");
        }else{
           echo "json";
       }
       
    
?>
