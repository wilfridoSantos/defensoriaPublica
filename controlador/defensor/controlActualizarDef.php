<?php 
    include '../../modelo/defensor/defensor.php';
/*     $id_defensor = $_POST['id_personal'];
    $expedientes = getNumExpedientes($id_defensor); */
    
   if($_FILES['fileToUpload']['size'] != 0){
        $nombreFoto = $_FILES["fileToUpload"]["name"];
        $rutaFoto   = $_FILES["fileToUpload"]["tmp_name"];
        $carpeta='../../recursos/uploads/';
        
        if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
<<<<<<< HEAD
            }

            $destino = $carpeta.basename($nombreFoto);

            if(move_uploaded_file($rutaFoto,$destino)){
                print_r('se ha subido la imagen');
                //copy($rutaFoto, $destino);
             

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
=======
        }
         
        $destino = $carpeta.basename($nombreFoto);
        move_uploaded_file($rutaFoto,$destino);
    }else{        
        $nombreFoto = $_POST['imagen'];
    }
        $defensor = Array(
                "id_personal"    =>$_POST['id_personal'],
                "nombre"         =>strtoupper($_POST['nombre']),
                "ap_paterno"     =>strtoupper($_POST['ap_paterno']),
                "ap_materno"     =>strtoupper($_POST['ap_materno']),
                "curp"           =>strtoupper($_POST['curp']),
                "calle"          =>strtoupper($_POST['calle']),
                "numero_ext"     =>$_POST['numero_ext'],    
                "numero_int"     =>$_POST['numero_int'],
                "colonia"        =>strtoupper($_POST['colonia']),
                "municipio"      =>strtoupper($_POST['municipio']),
                "telefono"       =>$_POST['telefono'],
                "correo_electronico" =>$_POST['correo_electronico'],
                "foto"          => $nombreFoto
            );        
>>>>>>> a05e837c99fd66770c52e73620bedf5b1bf496b6
        $actualizaDefensor = actualiza_defensor($defensor);
        $mensaje=['tipo'=>"exito",
        'mensaje'=>"Se ha actualizado satisfactoriamente"];
        $didigir="listar_defensor";
        //print_r($actualizaDefensor);      
        if(!isset($_GET['tipo'])){
<<<<<<< HEAD
            session_start();
             $_SESSION['mensaje'] = $mensaje;
            header("location: ../../vistas/administrador/index.php");
         }
         else{
             echo "json";  
         }
=======
           session_start();
           $_SESSION['mensaje'] = "Actualizacion exitoso";
<<<<<<< HEAD
          header("location: ../../vistas/administrador/index.php?dirigir=listar_defensores");
       }
       else{
=======
          //return 200; // 
         header("location: ../../vistas/administrador/");
        }else{
>>>>>>> a05e837c99fd66770c52e73620bedf5b1bf496b6
           echo "json";
       }
       
    
>>>>>>> 6f0ee65e1ea1c074f57c92361b8ad72ebb735c9e
?>
