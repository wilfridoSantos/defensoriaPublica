<?php 
<<<<<<< HEAD
    include '../../modelo/defensor/defensor.php';

        $nombreFoto = $_FILES["fileToUpload"]["name"];
        $rutaFoto   = $_FILES["fileToUpload"]["tmp_name"];
        $carpeta='../../recursos/uploads/';

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            $destino = $carpeta.basename($nombreFoto);

            if(move_uploaded_file($rutaFoto,$destino)){
                print_r('se ha subido la imagen');
                //copy($rutaFoto, $destino);
             

=======
    //header('Content-Type: application/json');
    include_once('../../modelo/defensor/defensor.php');
    
>>>>>>> 9d9acbccfc78c818e14c9a2b6b907456de52259c
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
            "genero"         =>$_POST['genero'],
            "telefono"       =>$_POST['telefono'],
            "correo_electronico" =>$_POST['correo_electronico'],
            "foto"          => $nombreFoto
        );        
        $actualizaDefensor = actualiza_defensor($defensor);

        
        //print_r($actualizaDefensor);      
        if(!isset($_GET['tipo'])){
           session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
<<<<<<< HEAD
          //return 200; // 
         header("location: ../../vistas/administrador/");
=======
          // header("location: ../../vistas/administrador/index.php?dirigir=listar_defensores");
>>>>>>> 9d9acbccfc78c818e14c9a2b6b907456de52259c
       }
       else{
           echo "json";
       }
    };
?>
